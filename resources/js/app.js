import './bootstrap';

/* Pooja Go - Phase 25.5 booking UI */
(() => {
    const form = document.getElementById('bookingForm');
    if (!form) return;
    const templeSelect = document.getElementById('templePoojaId');
    const summaryDate = document.getElementById('summaryDate');
    const summaryTime = document.getElementById('summaryTime');
    const summaryPriest = document.getElementById('summaryPriest');
    const summaryAddons = document.getElementById('summaryAddons');
    const summaryTotal = document.getElementById('summaryTotal');
    const currencyCode = document.getElementById('currencyCode');
    const customerNotes = document.getElementById('customerNotes');
    const baseAmount = Number(form.dataset.baseAmount || 0);
    const currencySymbol = form.dataset.currencySymbol || '₹';
    const endpoint = suffix => `${form.dataset.bookingBase}/poojas/${encodeURIComponent(form.dataset.slug)}/book/${suffix}`;
    const formatMoney = amount => `${currencySymbol}${Number(amount || 0).toFixed(2)}`;
    const formatTime = value => {
        if (!value) return '--';
        const p = String(value).split(':'); let h = Number(p[0]); const m = p[1] || '00';
        const suffix = h >= 12 ? 'PM' : 'AM'; h = h % 12 || 12; return `${String(h).padStart(2, '0')}:${m} ${suffix}`;
    };
    const escapeHtml = value => String(value ?? '').replace(/[&<>'"]/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[c]));
    const updateSummary = () => {
        const slot = form.querySelector('.booking-slot:checked');
        const priest = form.querySelector('.pujari-option:checked');
        const addonTotal = [...form.querySelectorAll('.addon-checkbox:checked')].reduce((s, el) => s + Number(el.dataset.price || 0), 0);
        const date = form.querySelector('.booking-date:checked')?.value;
        if (date && summaryDate) summaryDate.textContent = new Date(`${date}T00:00:00`).toLocaleDateString(undefined, {day:'2-digit',month:'short',year:'numeric'});
        if (summaryTime) summaryTime.textContent = slot ? `${formatTime(slot.dataset.start)} - ${formatTime(slot.dataset.end)}` : '--';
        if (summaryPriest) summaryPriest.textContent = priest?.closest('div')?.querySelector('h5')?.textContent?.trim() || 'No Preference';
        if (summaryAddons) summaryAddons.textContent = formatMoney(addonTotal);
        if (summaryTotal) summaryTotal.textContent = formatMoney(baseAmount + addonTotal);
    };
    const renderSlots = slots => {
        const groups = {Morning:[],Afternoon:[],Evening:[]};
        slots.forEach(slot => { const h = Number(String(slot.start_time).slice(0,2)); groups[h < 12 ? 'Morning' : (h < 17 ? 'Afternoon' : 'Evening')].push(slot); });
        Object.entries(groups).forEach(([period, items]) => {
            const container = form.querySelector(`.booking-slots[data-period="${period}"]`); if (!container) return; container.innerHTML = '';
            if (!items.length) { container.innerHTML = '<div class="small text-secondary">No available slots for this period.</div>'; return; }
            items.forEach(slot => { const wrap = document.createElement('div'); const id = `slot${slot.id}`; wrap.innerHTML = `<input type="radio" class="btn-check booking-slot" name="booking_slot_id" id="${id}" value="${slot.id}" data-start="${slot.start_time}" data-end="${slot.end_time}"><label for="${id}" class="btn btn-outline-secondary">${formatTime(slot.start_time)}</label>`; container.appendChild(wrap); });
        });
    };
    const loadSlots = async () => {
        const id = templeSelect?.value, date = form.querySelector('.booking-date:checked')?.value; if (!id || !date) return;
        form.querySelectorAll('.booking-slots').forEach(el => el.innerHTML = '<div class="small text-secondary">Loading available slots…</div>');
        try { const r = await fetch(`${endpoint('slots')}?temple_pooja_id=${encodeURIComponent(id)}&date=${encodeURIComponent(date)}`, {headers:{Accept:'application/json','X-Requested-With':'XMLHttpRequest'}}); if (!r.ok) throw new Error(); renderSlots((await r.json()).slots || []); updateSummary(); } catch { form.querySelectorAll('.booking-slots').forEach(el => el.innerHTML = '<div class="small text-danger">Unable to load slots. Please try again.</div>'); }
    };
    const loadPujaris = async () => {
        const id = templeSelect?.value, list = form.querySelector('.vstack.gap-3'); if (!id || !list) return;
        try {
            const r = await fetch(`${endpoint('pujaris')}?temple_pooja_id=${encodeURIComponent(id)}`, {headers:{Accept:'application/json','X-Requested-With':'XMLHttpRequest'}}); if (!r.ok) throw new Error();
            const data = await r.json(); const any = list.querySelector('#priestAny')?.closest('div'); list.innerHTML = ''; if (any) list.appendChild(any);
            (data.pujaris || []).forEach(p => { const wrap = document.createElement('div'); wrap.innerHTML = `<input type="radio" class="btn-check pujari-option" name="pujari_profile_id" id="priest${p.id}" value="${p.id}"><label for="priest${p.id}" class="card border border-warning-subtle rounded-4 p-3 w-100"><div class="d-flex align-items-center gap-3"><div class="rounded-circle d-flex align-items-center justify-content-center bg-pn-beige text-pn-primary" style="width:56px;height:56px"><i class="bi bi-person fs-4"></i></div><div><h5 class="font-serif text-pn-brown mb-1">${escapeHtml(p.display_name)}</h5><small class="text-secondary">${p.experience_years ? `${p.experience_years}+ Years` : 'Experience not specified'}</small></div></div></label>`; list.appendChild(wrap); }); updateSummary();
        } catch { /* Keep the server-rendered list if refresh fails. */ }
    };
    templeSelect?.addEventListener('change', () => {
        const option = templeSelect.options[templeSelect.selectedIndex];
        if (currencyCode && option?.dataset.currency) currencyCode.value = option.dataset.currency;
        loadSlots();
        loadPujaris();
    });
    form.addEventListener('change', e => {
        if (e.target.matches('.booking-date')) loadSlots();
        if (e.target.matches('.booking-slot,.pujari-option,.addon-checkbox')) updateSummary();
        if (e.target.matches('.family-member')) {
            const container = e.target.closest('.col-12, .col-md-6');
            container?.querySelectorAll('.family-member-dependent').forEach(input => input.disabled = !e.target.checked);
        }
    });
    form.addEventListener('submit', e => { if (!templeSelect?.value || !form.querySelector('.booking-slot:checked')) { e.preventDefault(); alert(!templeSelect?.value ? 'Please select a temple.' : 'Please select an available time slot.'); return; } if (customerNotes) {
            const instructions = form.querySelector('[name="sankalpam[special_instructions]"]');
            customerNotes.value = instructions?.value || '';
        }
        const terms = document.getElementById('bookingTerms'); if (terms && !terms.checked) { e.preventDefault(); alert('Please accept the booking terms and policies.'); } });
    updateSummary();
})();

/* Pooja Go - Phase 4 frontend listing interactions */
(() => {
    const listing = document.querySelector('[data-pn-listing]');
    if (!listing) return;
    const type = listing.dataset.pnListing;
    const items = Array.from(listing.querySelectorAll('[data-pn-item]'));
    if (!items.length) return;
    const pageSize = 6;
    let currentPage = 1;
    const text = value => String(value ?? '').trim().toLowerCase();
    const number = value => Number.parseFloat(String(value ?? '').replace(/[^0-9.]/g, '')) || 0;
    const searchInputs = Array.from(document.querySelectorAll('input[type="search"]'));
    const pagination = Array.from(document.querySelectorAll('.pagination')).find(el => el.querySelector('.page-link'));
    const getSearch = () => {
        const terms = type === 'poojas' ? ['pooja'] : type === 'priests' ? ['priest'] : type.includes('product') ? ['product'] : ['temple'];
        const input = searchInputs.find(el => terms.some(term => text(el.getAttribute('placeholder')).includes(term)));
        return text(input?.value);
    };
    const checkedValues = selector => Array.from(document.querySelectorAll(selector)).filter(el => el.checked).map(el => text(el.value));
    const selectedValue = name => text(Array.from(document.querySelectorAll(`select[name="${name}"]`)).find(el => el.value)?.value);
    const minMax = () => {
        const nums = Array.from(document.querySelectorAll('input[type="number"]'));
        return { min: number(nums.find(el => text(el.placeholder) === 'min')?.value), max: number(nums.find(el => text(el.placeholder) === 'max')?.value) };
    };
    const matches = item => {
        const haystack = text(item.dataset.search || item.dataset.name);
        const search = getSearch();
        if (search && !haystack.includes(search)) return false;
        if (type === 'poojas') {
            const categories = checkedValues('input[id^="category"], input[id^="mobileCategory"]');
            const occasions = checkedValues('input[id^="occasion"], input[id^="mobileOccasion"]');
            const location = selectedValue('location'); const {min,max}=minMax();
            if (categories.length && !categories.includes(text(item.dataset.category))) return false;
            if (occasions.length && !occasions.some(v => haystack.includes(v))) return false;
            if (location && location !== 'all locations' && text(item.dataset.location) !== location) return false;
            const price=number(item.dataset.price); if(min&&price<min) return false; if(max&&price>max) return false;
        }
        if (type === 'products' || type === 'product-category') {
            const categories = checkedValues('input[id^="category"], input[id^="mobileCategory"]');
            const rating = text(document.querySelector('input[name="rating"]:checked')?.value || document.querySelector('input[name="mobileRating"]:checked')?.value);
            const {min,max}=minMax();
            if(categories.length&&!categories.includes(text(item.dataset.category))) return false;
            if(rating&&number(item.dataset.rating)<number(rating)) return false;
            const price=number(item.dataset.price); if(min&&price<min) return false; if(max&&price>max) return false;
            if(type==='products'&&(document.getElementById('inStock')?.checked||document.getElementById('mobileInStock')?.checked)&&item.dataset.stock!=='1') return false;
        }
        if (type === 'temples') {
            const location=selectedValue('location'), deity=selectedValue('deity'), service=selectedValue('service');
            if(location&&location!=='all locations'&&!text(item.dataset.location).includes(location)) return false;
            if(deity&&deity!=='all deities'&&text(item.dataset.deity)!==deity) return false;
            if(service&&service!=='all services'&&!text(item.dataset.services).includes(service)) return false;
        }
        if (type === 'priests') {
            const location=selectedValue('location'), specialization=selectedValue('specialization'), language=selectedValue('language');
            if(location&&location!=='all locations'&&!text(item.dataset.location).includes(location)) return false;
            if(specialization&&specialization!=='all specializations'&&!text(item.dataset.specializations).includes(specialization)) return false;
            if(language&&language!=='all languages'&&!text(item.dataset.languages).includes(language)) return false;
        }
        return true;
    };
    const sortItems = visible => {
        const value=text(document.querySelector('#sortPoojas, #sortProducts, #categorySort')?.value); const copy=[...visible];
        if(value.includes('low to high')) return copy.sort((a,b)=>number(a.dataset.price)-number(b.dataset.price));
        if(value.includes('high to low')) return copy.sort((a,b)=>number(b.dataset.price)-number(a.dataset.price));
        if(value.includes('highest rated')) return copy.sort((a,b)=>number(b.dataset.rating)-number(a.dataset.rating));
        if(value.includes('most popular')) return copy.sort((a,b)=>number(b.dataset.reviews)-number(a.dataset.reviews));
        if(value==='az'||value.includes('a-z')) return copy.sort((a,b)=>text(a.dataset.name).localeCompare(text(b.dataset.name)));
        return copy;
    };
    const renderPagination = totalPages => {
        if(!pagination)return; pagination.innerHTML='';
        const nav=pagination.closest('nav'); if(totalPages<=1){nav?.classList.add('d-none');return;} nav?.classList.remove('d-none');
        const add=(label,page,disabled=false,active=false)=>{const li=document.createElement('li');li.className=`page-item${disabled?' disabled':''}${active?' active':''}`;const a=document.createElement('a');a.href='#';a.className='page-link text-pn-primary';a.textContent=label;if(!disabled)a.addEventListener('click',e=>{e.preventDefault();currentPage=page;render();listing.scrollIntoView({behavior:'smooth',block:'start'});});li.appendChild(a);pagination.appendChild(li);};
        add('‹',Math.max(1,currentPage-1),currentPage===1); for(let p=1;p<=totalPages;p++)add(String(p),p,false,p===currentPage); add('›',Math.min(totalPages,currentPage+1),currentPage===totalPages);
    };
    const render=()=>{const visible=sortItems(items.filter(matches));const totalPages=Math.max(1,Math.ceil(visible.length/pageSize));currentPage=Math.min(currentPage,totalPages);items.forEach(i=>i.classList.add('d-none'));visible.slice((currentPage-1)*pageSize,currentPage*pageSize).forEach(i=>i.classList.remove('d-none'));document.querySelectorAll('[data-pn-result-count]').forEach(el=>el.textContent=String(visible.length));document.querySelectorAll('[data-pn-empty]').forEach(el=>el.classList.toggle('d-none',visible.length!==0));renderPagination(totalPages);};
    document.querySelectorAll('input[type="search"], select, input[type="checkbox"], input[type="radio"], input[type="number"]').forEach(control=>control.addEventListener(control.type==='search'||control.tagName==='INPUT'&&control.type==='number'?'input':'change',()=>{currentPage=1;render();}));
    document.querySelectorAll('button, a').forEach(control=>{const label=text(control.textContent);if(!['clear','clear all','apply filters'].includes(label))return;control.addEventListener('click',e=>{e.preventDefault();document.querySelectorAll('input[type="checkbox"],input[type="radio"]').forEach(el=>el.checked=false);document.querySelectorAll('select').forEach(el=>el.selectedIndex=0);document.querySelectorAll('input[type="number"],input[type="search"]').forEach(el=>el.value='');currentPage=1;render();});});
    render();
})();


/* Pooja Go - Phase 4 blog/search pagination */
(() => {
    const style = document.createElement('style');
    style.textContent = '.d-none-filter{display:none!important}.d-none-paged{display:none!important}';
    document.head.appendChild(style);

    const createPager = (cards, nav, pageSize = 6) => {
        let page = 1;
        const eligible = () => cards.filter(card => !card.classList.contains('d-none-filter'));
        const render = () => {
            const visible = eligible();
            const pages = Math.max(1, Math.ceil(visible.length / pageSize));
            page = Math.min(page, pages);
            cards.forEach(card => card.classList.add('d-none-paged'));
            visible.slice((page-1)*pageSize, page*pageSize).forEach(card => card.classList.remove('d-none-paged'));
            const ul = nav?.querySelector('.pagination'); if (!ul) return;
            ul.querySelectorAll('[data-pn-page]').forEach(el => el.remove());
            const add=(label,target,disabled=false,active=false)=>{
                const li=document.createElement('li');li.className=`page-item${disabled?' disabled':''}${active?' active':''}`;
                const a=document.createElement('button');a.type='button';a.className='page-link';a.textContent=label;a.dataset.pnPage='1';
                if(!disabled)a.addEventListener('click',()=>{page=target;render();});
                li.appendChild(a);ul.appendChild(li);
            };
            add('‹',Math.max(1,page-1),page===1);
            for(let i=1;i<=pages;i++)add(String(i),i,false,i===page);
            add('›',Math.min(pages,page+1),page===pages);
        };
        return {refresh(){page=1;render();},render};
    };

    const blogCards=Array.from(document.querySelectorAll('.blog-card-wrapper'));
    const blogNav=document.querySelector('nav[aria-label="Blog pagination"]');
    if(blogCards.length&&blogNav){
        const pager=createPager(blogCards,blogNav);
        const refresh=()=>setTimeout(()=>{blogCards.forEach(c=>c.classList.toggle('d-none-filter',c.classList.contains('d-none')));pager.refresh();},0);
        document.getElementById('blogSearch')?.addEventListener('input',refresh);
        document.querySelectorAll('.blog-category-filter').forEach(el=>el.addEventListener('click',refresh));
        blogCards.forEach(c=>c.classList.toggle('d-none-filter',c.classList.contains('d-none')));
        pager.render();
    }

    const searchCards=Array.from(document.querySelectorAll('.search-result-card'));
    const searchNav=document.getElementById('searchPagination');
    if(searchCards.length&&searchNav){
        const pager=createPager(searchCards,searchNav);
        const refresh=()=>setTimeout(()=>{searchCards.forEach(c=>c.classList.toggle('d-none-filter',c.classList.contains('d-none')));pager.refresh();},0);
        document.querySelectorAll('#searchResults input, #sortResults').forEach(el=>el.addEventListener('input',refresh));
        document.querySelectorAll('#searchResults input, #sortResults').forEach(el=>el.addEventListener('change',refresh));
        searchCards.forEach(c=>c.classList.toggle('d-none-filter',c.classList.contains('d-none')));
        pager.render();
    }
})();

/* ============================================================
   Pooja Go - Customer Address Book
   Country → State → City
============================================================ */

(() => {

    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('addAddressForm') || document.getElementById('editAddressForm');

        if (!form) {
            return;
        }


        /* ========================================================
           FORM VALIDATION
        ======================================================== */

        form.addEventListener('submit', function (event) {

            if (!form.checkValidity()) {

                event.preventDefault();
                event.stopPropagation();

            }

            form.classList.add('was-validated');

        });


        /* ========================================================
           MOBILE NUMBER
        ======================================================== */

        const phone = document.getElementById('phone');

        phone?.addEventListener('input', function () {

            this.value = this.value
                .replace(/\D/g, '')
                .slice(0, 10);

        });


        /* ========================================================
           PINCODE
        ======================================================== */

        const postalCode =
            document.getElementById('postal_code');

        postalCode?.addEventListener('input', function () {

            this.value = this.value
                .replace(/\D/g, '')
                .slice(0, 6);

        });


        /* ========================================================
           SAVE BUTTON LOADING STATE
        ======================================================== */

        form.addEventListener('submit', function () {

            if (!form.checkValidity()) {
                return;
            }

            const saveButton = document.getElementById('saveAddressButton') || document.getElementById('updateAddressButton');

            if (!saveButton) {
                return;
            }

            saveButton.disabled = true;

            saveButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>' +
			(
				document.getElementById('editAddressForm')
					? 'Updating Address...'
					: 'Saving Address...'
			);

				});


        /* ========================================================
           ADDRESS TYPE VISUAL SELECTION
        ======================================================== */

        const addressTypes =
            document.querySelectorAll(
                'input[name="address_type"]'
            );


        function updateAddressTypeStyles() {

            addressTypes.forEach(function (radio) {

                const label =
                    document.querySelector(
                        'label[for="' + radio.id + '"]'
                    );

                if (!label) {
                    return;
                }


                if (radio.checked) {

                    label.classList.add(
                        'border-warning',
                        'bg-pn-cream'
                    );

                    label.classList.remove(
                        'border-warning-subtle'
                    );

                } else {

                    label.classList.remove(
                        'border-warning',
                        'bg-pn-cream'
                    );

                    label.classList.add(
                        'border-warning-subtle'
                    );

                }

            });

        }


        addressTypes.forEach(function (radio) {

            radio.addEventListener(
                'change',
                updateAddressTypeStyles
            );

        });


        updateAddressTypeStyles();


        /* ========================================================
           COUNTRY / STATE / CITY
        ======================================================== */

        const countrySelect =
            document.getElementById('country_id');

        const stateSelect =
            document.getElementById('state_id');

        const citySelect =
            document.getElementById('city_id');

        const citiesUrl =
            form.dataset.citiesUrl;


        if (
            !countrySelect ||
            !stateSelect ||
            !citySelect ||
            !citiesUrl
        ) {
            return;
        }


        /* ========================================================
           RESET CITY
        ======================================================== */

        function resetCities() {

            citySelect.innerHTML =
                '<option value="">Select city</option>';

            citySelect.disabled = true;

        }


        /* ========================================================
           FILTER STATES BY COUNTRY
        ======================================================== */

        function filterStates() {

            const countryId =
                countrySelect.value;


            Array.from(
                stateSelect.options
            ).forEach(function (option, index) {

                if (index === 0) {
                    return;
                }


                const optionCountryId =
                    option.dataset.countryId;


                option.hidden =
                    countryId !== '' &&
                    optionCountryId !== countryId;

            });


            const selectedState =
                stateSelect.options[
                    stateSelect.selectedIndex
                ];


            if (
                selectedState &&
                selectedState.value &&
                selectedState.dataset.countryId !== countryId
            ) {

                stateSelect.value = '';

            }


            resetCities();

        }


        /* ========================================================
           LOAD CITIES
        ======================================================== */

        async function loadCities() {

            const stateId =
                stateSelect.value;


            resetCities();


            if (!stateId) {
                return;
            }


            citySelect.innerHTML =
                '<option value="">Loading cities...</option>';

            citySelect.disabled = true;


            try {

                const response =
                    await fetch(
                        citiesUrl +
                        '?state_id=' +
                        encodeURIComponent(stateId),
                        {
                            method: 'GET',

                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },

                            credentials: 'same-origin'
                        }
                    );


                if (!response.ok) {

                    throw new Error(
                        'Cities request failed with status ' +
                        response.status
                    );

                }


                const cities =
                    await response.json();


                citySelect.innerHTML =
                    '<option value="">Select city</option>';


                if (
                    !Array.isArray(cities) ||
                    cities.length === 0
                ) {

                    citySelect.innerHTML =
                        '<option value="">No cities available for this state</option>';

                    citySelect.disabled = true;

                    return;

                }


                const oldCityId =
                    form.dataset.oldCityId || '';


                cities.forEach(function (city) {

                    const option =
                        document.createElement('option');


                    option.value =
                        city.id;


                    option.textContent =
                        city.name;


                    if (
                        oldCityId !== '' &&
                        String(city.id) ===
                        String(oldCityId)
                    ) {

                        option.selected = true;

                    }


                    citySelect.appendChild(option);

                });


                citySelect.disabled = false;


            } catch (error) {

                console.error(
                    'Unable to load cities:',
                    error
                );


                citySelect.innerHTML =
                    '<option value="">Unable to load cities</option>';

                citySelect.disabled = true;

            }

        }


        /* ========================================================
           EVENTS
        ======================================================== */

        countrySelect.addEventListener(
            'change',
            filterStates
        );


        stateSelect.addEventListener(
            'change',
            loadCities
        );


        /* ========================================================
           INITIAL STATE
        ======================================================== */

        filterStates();


        if (stateSelect.value) {
            loadCities();
        }

    });

})();

/* ============================================================
   Pooja Go - Customer Address Book Actions
   Delete Address
============================================================ */

(() => {
    document.addEventListener('DOMContentLoaded', function () {

        const deleteButtons =
            document.querySelectorAll('.delete-address');

        const deleteMessage =
            document.getElementById('deleteAddressMessage');

        const confirmDelete =
            document.getElementById('confirmDeleteAddress');

        const deleteForm =
            document.getElementById('deleteAddressForm');

        let selectedAddressId = null;

        deleteButtons.forEach(function (button) {

            button.addEventListener('click', function () {

                selectedAddressId =
                    this.dataset.addressId || null;

                const addressType =
                    this.dataset.addressType || 'address';

                if (deleteMessage) {
                    deleteMessage.textContent =
                        'Are you sure you want to delete your ' +
                        addressType.toLowerCase() +
                        ' address?';
                }
            });
        });

        confirmDelete?.addEventListener('click', function () {

            if (!selectedAddressId || !deleteForm) {
                return;
            }

            this.disabled = true;

            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Deleting...';

            deleteForm.action =
                '/dashboard/addresses/' +
                encodeURIComponent(selectedAddressId);

            deleteForm.submit();
        });
    });
})();


/* ============================================================
   Pooja Go - Priest Booking Date, Time and Review
   Isolated from the existing Pooja booking functionality.
============================================================ */

(() => {
    document.addEventListener('DOMContentLoaded', () => {

        const form = document.getElementById('priestBookingForm');
        if (!form) return;

        // Required hidden inputs.
        const dateInput = document.getElementById('selectedBookingDate');
        const availabilityInput = document.getElementById('selectedAvailabilityId');
        const startInput = document.getElementById('selectedBookingStartTime');
        const endInput = document.getElementById('selectedBookingEndTime');
        const serviceInput = document.getElementById('selectedPriestService');
        const termsInput = document.getElementById('termsAcceptedValue');

        if (
            !dateInput ||
            !availabilityInput ||
            !startInput ||
            !endInput ||
            !serviceInput ||
            !termsInput
        ) {
            console.error('Priest booking is missing required hidden inputs.');
            return;
        }

        // Availability data generated by PriestController.
        const slotDataElement = document.getElementById('priestServiceSlotData');

        let serviceSlotData = {};

        try {
            serviceSlotData = JSON.parse(slotDataElement?.textContent || '{}');
        } catch (error) {
            console.error('Unable to read priest service availability data.', error);
            return;
        }

        // Containers.
        const dateContainer = document.getElementById('bookingDateOptions');
        const timeContainer = document.getElementById('bookingTimeOptions');

        const dateLabel = document.getElementById('bookingSelectedDateLabel');

        const message = document.getElementById('priestBookingReviewMessage');

        // Summary elements.
        const summaryService = document.getElementById('priestBookingSummaryService');
        const summaryDate = document.getElementById('priestBookingSummaryDate');
        const summaryDay = document.getElementById('priestBookingSummaryDay');
        const summaryTime = document.getElementById('priestBookingSummaryTime');

        const terms = document.getElementById('terms');

        let currentDates = [];
        let currentSlots = [];

        function showMessage(text) {
            if (!message) return;

            message.textContent = text;
            message.classList.remove('d-none');

            message.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        function clearMessage() {
            if (!message) return;

            message.textContent = '';
            message.classList.add('d-none');
        }

        function formatDate(dateValue) {
            if (!dateValue) return 'Not selected';

            const date = new Date(dateValue + 'T00:00:00');

            return date.toLocaleDateString('en-IN', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
        }

        function formatTime(timeValue) {
            if (!timeValue) return '';

            const [hours, minutes] = timeValue.split(':');

            const date = new Date();
            date.setHours(Number(hours), Number(minutes), 0, 0);

            return date.toLocaleTimeString('en-IN', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
        }

        function resetSelectedTime() {
            availabilityInput.value = '';
            startInput.value = '';
            endInput.value = '';

            if (summaryTime) {
                summaryTime.textContent = 'Please select a time';
            }
        }

        function selectTime(button) {

            if (!button || button.disabled) {
                resetSelectedTime();
                return;
            }

            timeContainer.querySelectorAll('.booking-time-option').forEach(item => {
                item.classList.remove('btn-pn');
                item.classList.add('btn-pn-outline');

                item.dataset.selected = 'false';
                item.setAttribute('aria-pressed', 'false');
            });

            button.classList.remove('btn-pn-outline');
            button.classList.add('btn-pn');

            button.dataset.selected = 'true';
            button.setAttribute('aria-pressed', 'true');

            availabilityInput.value = button.dataset.availabilityId || '';
            startInput.value = button.dataset.startTime || '';
            endInput.value = button.dataset.endTime || '';

            if (summaryTime) {
                summaryTime.textContent = button.textContent.trim();
            }
        }

        function renderDates() {

            dateContainer.innerHTML = '';

            if (!currentDates.length) {

                dateContainer.innerHTML = `
                    <div class="col-12">
                        <div class="alert alert-light border mb-0">
                            No available dates for this service.
                        </div>
                    </div>
                `;

                dateInput.value = '';
                if (summaryDate) summaryDate.textContent = 'Not selected';
                if (summaryDay) summaryDay.textContent = 'Not selected';
                if (dateLabel) dateLabel.textContent = 'Not selected';

                renderTimes('');

                return;
            }

            currentDates.forEach((date, index) => {

                const column = document.createElement('div');
                column.className = 'col';

                const button = document.createElement('button');

                button.type = 'button';
                button.className = 'btn btn-pn-outline w-100 py-3 booking-date-option';

                button.dataset.bookingDate = date.date_value;
                button.dataset.bookingDay = date.day_name;

                button.setAttribute('aria-pressed', 'false');

                button.innerHTML = `
                    <strong class="d-block fs-5"></strong>
                    <small class="d-block"></small>
                    <small></small>
                `;

                button.querySelector('strong').textContent = date.date;
                button.querySelectorAll('small')[0].textContent = date.month;
                button.querySelectorAll('small')[1].textContent = date.day;

                button.addEventListener('click', () => {
                    selectDate(date.date_value);
                });

                column.appendChild(button);
                dateContainer.appendChild(column);
            });

            // Select the first available date.
            selectDate(currentDates[0].date_value);
        }

        function renderTimes(selectedDate) {

            timeContainer.innerHTML = '';

            const dateSlots = currentSlots.filter(slot =>
                slot.date_value === selectedDate
            );

            if (!dateSlots.length) {

                timeContainer.innerHTML = `
                    <div class="small text-secondary">
                        No available time slots for this date.
                    </div>
                `;

                resetSelectedTime();
                return;
            }

            dateSlots.forEach(slot => {

                const button = document.createElement('button');

                button.type = 'button';

                button.className = 'btn btn-pn-outline booking-time-option';

                button.dataset.availabilityId = slot.availability_id;
                button.dataset.available = slot.available ? 'true' : 'false';
                button.dataset.bookingDate = slot.date_value;
                button.dataset.startTime = slot.start_time;
                button.dataset.endTime = slot.end_time;

                button.dataset.selected = 'false';

                button.setAttribute('aria-pressed', 'false');

                button.innerHTML = '<i class="bi bi-clock me-1"></i>';

                button.appendChild(
                    document.createTextNode(slot.time)
                );

                button.addEventListener('click', () => {
                    selectTime(button);
                    clearMessage();
                });

                timeContainer.appendChild(button);
            });

            // Automatically select the first available slot.
            const firstSlot = timeContainer.querySelector(
                '.booking-time-option[data-available="true"]'
            );

            if (firstSlot) {
                selectTime(firstSlot);
            } else {
                resetSelectedTime();
            }
        }

        function selectDate(selectedDate) {

            const selectedDateData = currentDates.find(date =>
                date.date_value === selectedDate
            );

            if (!selectedDateData) return;

            dateContainer.querySelectorAll('.booking-date-option').forEach(button => {

                const active = button.dataset.bookingDate === selectedDate;

                button.classList.toggle('btn-pn', active);
                button.classList.toggle('btn-pn-outline', !active);

                button.dataset.selected = active ? 'true' : 'false';

                button.setAttribute(
                    'aria-pressed',
                    active ? 'true' : 'false'
                );
            });

            dateInput.value = selectedDate;

            if (summaryDate) {
                summaryDate.textContent = formatDate(selectedDate);
            }

            if (summaryDay) {
                summaryDay.textContent = selectedDateData.day_name;
            }

            if (dateLabel) {
                dateLabel.textContent = formatDate(selectedDate);
            }

            renderTimes(selectedDate);

            clearMessage();
        }

        function updateService(radio) {

            if (!radio) return;

            const serviceId = radio.value;

            serviceInput.value = serviceId;

            if (summaryService) {
                summaryService.textContent =
                    radio.dataset.serviceName || 'No service selected';
            }

            // Get dates and slots for the selected service.
            const data = serviceSlotData[serviceId];

            if (!data) {

                currentDates = [];
                currentSlots = [];

                dateContainer.innerHTML = `
                    <div class="col-12">
                        <div class="alert alert-light border mb-0">
                            Availability information is not available.
                        </div>
                    </div>
                `;

                renderTimes('');

                return;
            }

            currentDates = Array.isArray(data.dates) ? data.dates : [];
            currentSlots = Array.isArray(data.slots) ? data.slots : [];

            // Reset previous date and time selections.
            dateInput.value = '';
            resetSelectedTime();

            renderDates();

            clearMessage();
        }

        // Service selection.
        form.querySelectorAll('input[name="service_choice"]').forEach(radio => {

            radio.addEventListener('change', () => {

                if (radio.checked) {
                    updateService(radio);
                }

            });

        });

        // Terms acceptance.
        if (terms) {

            terms.addEventListener('change', () => {

                termsInput.value = terms.checked ? '1' : '0';

                clearMessage();

            });

        }

        // Continue to Review buttons.
        document.querySelectorAll('[data-priest-booking-review]').forEach(button => {

            button.addEventListener('click', () => {

                clearMessage();

                const selectedService = form.querySelector(
                    'input[name="service_choice"]:checked'
                );

                if (!selectedService) {
                    showMessage('Please select a service.');
                    return;
                }

                serviceInput.value = selectedService.value;

                if (!dateInput.value) {
                    showMessage('Please select a booking date.');
                    return;
                }

                if (
                    !availabilityInput.value ||
                    !startInput.value ||
                    !endInput.value
                ) {
                    showMessage(
                        'Please select an available time slot for the selected date.'
                    );
                    return;
                }

                const requiredFields = [
                    ['first_name', 'Please enter your first name.'],
                    ['last_name', 'Please enter your last name.'],
                    ['mobile', 'Please enter your mobile number.'],
                    ['address', 'Please enter your address.'],
                    ['city', 'Please enter your city.'],
                    ['state', 'Please enter your state.'],
                    ['pincode', 'Please enter your PIN code.']
                ];

                for (const [name, error] of requiredFields) {

                    const field = form.querySelector(`[name="${name}"]`);

                    if (field && !field.value.trim()) {
                        field.focus();
                        showMessage(error);
                        return;
                    }

                }

                if (terms && !terms.checked) {

                    terms.focus();

                    showMessage(
                        'Please accept the booking terms to continue.'
                    );

                    return;
                }

                termsInput.value = terms && terms.checked ? '1' : '0';

                showMessage(
                    'Your selections are ready for review. ' +
                    'Booking confirmation and payment are not submitted yet.'
                );

            });

        });

        // Initialize the first checked service.
        const initialService = form.querySelector(
            'input[name="service_choice"]:checked'
        );

        if (initialService) {
            updateService(initialService);
        } else {
            currentDates = [];
            currentSlots = [];
            renderDates();
        }

        if (terms) {
            termsInput.value = terms.checked ? '1' : '0';
        }

    });
})();