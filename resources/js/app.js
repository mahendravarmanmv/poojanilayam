import './bootstrap';

/* Pooja Nilayam - Phase 25.5 booking UI */
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

/* Pooja Nilayam - Phase 4 frontend listing interactions */
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


/* Pooja Nilayam - Phase 4 blog/search pagination */
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
   Pooja Nilayam - Customer Address Book
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
   Pooja Nilayam - Customer Address Book Actions
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