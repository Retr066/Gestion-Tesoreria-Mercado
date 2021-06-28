<x-app-layout>

    <h1 class="text-center ">Modulo de Balance</h1>
    <div class=" max-w-7xl mx-auto text-center sm:px-6 lg:px-8">
        <livewire:filtro />
    </div>


    <div class="flex justify-end mr-5 mb-3  btn-status">
        <input onchange="javascript:showContent()" type="checkbox" name="checkbox" id="checkbox" class="hidden" />
        <label for="checkbox" class="btn-change flex items-center p-1 rounded-lg w-12 h-6 cursor-pointer"></label>

    </div>

    <div id="content" style="display:block;">
        @livewire('balance-ingreso')
    </div>
    <div id="content2" style="display:none;">
    @livewire('balance-egreso')
    </div>


    @push('styles')
        <style>
            :root {
                --bg-btn: #C6F6D5;
                --btn-color: #38A169;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            #checkbox:checked~.btn-change::before {
                transition: 0.3s;
                transform: translateX(23px);
            }

            .btn-change {
                background-color: var(--bg-btn);
            }

            .btn-change::before {
                content: '';
                display: block;
                width: 17px;
                height: 17px;
                border-radius: 50%;
                background-color: var(--btn-color);
                transition: 0.3s;
                transform: translateX(0);
            }

        </style>
    @endpush
    @push('scripts')
        <script>
           const btn = document.querySelector('.btn-change');
            btn.addEventListener('click', () => {
            if (document.getElementById('checkbox').checked) {
                btn.style.setProperty('--bg-btn', '#C6F6D5');
                btn.style.setProperty('--btn-color', '#38A169');
            } else {
                btn.style.setProperty('--bg-btn', '#fed7d7');
                btn.style.setProperty('--btn-color', '#e53e3e');
            }
            });


              function showContent() {
                const element = document.getElementById("content");
                 const element2 = document.getElementById("content2");
                 const check = document.getElementById("checkbox");
                 if (check.checked) {
                     element.style.display = 'none';
                     element2.style.display = 'block';
                 } else {
                     element.style.display = 'block';
                     element2.style.display = 'none';
                 }
             };
        </script>
    @endpush
</x-app-layout>
