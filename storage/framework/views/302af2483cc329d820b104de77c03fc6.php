<button
    x-data="{
        theme: localStorage.getItem('theme') || 'system',

        init() {
            this.$watch('theme', (val) => {
                localStorage.setItem('theme', val);
                this.updateHtmlClass();
            });
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (this.theme === 'system') this.updateHtmlClass();
            });
            this.updateHtmlClass();
        },

        cycle() {
            const modes = ['light', 'dark', 'system'];
            const nextIndex = (modes.indexOf(this.theme) + 1) % modes.length;
            this.theme = modes[nextIndex];
        },

        updateHtmlClass() {
            const isDark = this.theme === 'dark' ||
                          (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            document.documentElement.classList.toggle('dark', isDark);
        }
    }"
    @click="cycle()"
    type="button"

    class="relative flex items-center justify-center p-2 rounded-lg
           text-slate-700 dark:text-slate-100        <!-- visible dans les deux modes -->
           hover:bg-slate-200 dark:hover:bg-slate-700
           transition-all duration-300 ease-out"

    :title="'Mode : ' + theme"
>
    <div class="relative w-6 h-6">

        <!-- MODE LIGHT -->
        <div x-show="theme === 'light'"
             x-transition
             class="absolute inset-0"
        >
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 3v1m0 16v1m9-9h1M4 12H3m15.325-7.757l-.707.707M6.343 17.657l-.707.707M16.95 7.05l.707-.707M7.05 16.95l-.707.707M12 15a3 3 0 100-6 3 3 0 000 6z" />
            </svg>
        </div>

        <!-- MODE DARK -->
        <div x-show="theme === 'dark'"
             style="display:none;"
             x-transition
             class="absolute inset-0"
        >
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </div>

        <!-- MODE SYSTEM -->
        <div x-show="theme === 'system'"
             style="display:none;"
             x-transition
             class="absolute inset-0"
        >
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>
    </div>
</button>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/theme-toggle.blade.php ENDPATH**/ ?>