<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label' => null,
    'description' => null,
    'error' => null,
    'name' => null,
    'required' => false,
    'length' => 6
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'label' => null,
    'description' => null,
    'error' => null,
    'name' => null,
    'required' => false,
    'length' => 6
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if (isset($component)) { $__componentOriginale59cbfc9fe6826a2536559f28ec4e416 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.field','data' => ['label' => $label,'description' => $description,'error' => $error,'name' => $name,'required' => $required]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($description),'error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($error),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required)]); ?>
    <div <?php echo e($attributes->merge(['class' => 'flex gap-2'])); ?>

         x-modelable="value"
         @paste="handlePaste($event)"
         x-data="{
            value: '',
            length: <?php echo e($length); ?>,
            otp: Array(<?php echo e($length); ?>).fill(''),

            init() {
                this.$watch('value', (newValue) => {
                    if (!newValue) {
                        this.otp = Array(this.length).fill('');
                        this.$nextTick(() => this.focusInput(0));
                    }
                });
            },

            focusInput(index) {
                this.$nextTick(() => {
                    const inputs = Array.from(this.$root.querySelectorAll('.otp-char-input'));
                    if (inputs[index]) {
                        inputs[index].focus();
                        inputs[index].select();
                    }
                });
            },

            handleInput(e, index) {
                let val = e.target.value.replace(/[^0-9]/g, '');

                if (val.length > 1) {
                    const chars = val.split('').slice(0, this.length - index);
                    e.target.value = chars[0] || '';
                    chars.forEach((c, i) => {
                        this.otp[index + i] = c;
                    });
                    this.focusInput(Math.min(index + chars.length, this.length - 1));
                    this.sync();
                    return;
                }

                val = val.slice(-1);
                this.otp[index] = val;
                e.target.value = val;

                if (val !== '' && index < this.length - 1) {
                    this.focusInput(index + 1);
                }

                this.sync();
            },

            handleKeydown(e, index) {
                if (e.key === 'Backspace') {
                    if (e.target.value === '' && index > 0) {
                        e.preventDefault();
                        this.otp[index - 1] = '';
                        this.sync();
                        this.focusInput(index - 1);
                    } else {
                        this.otp[index] = '';
                        this.sync();
                    }
                }
                else if (e.key === 'ArrowLeft') {
                    if (index > 0) {
                        e.preventDefault();
                        this.focusInput(index - 1);
                    }
                }
                else if (e.key === 'ArrowRight') {
                    if (index < this.length - 1) {
                        e.preventDefault();
                        this.focusInput(index + 1);
                    }
                }
            },

            handlePaste(e) {
                e.preventDefault();
                const clipboardData = e.clipboardData || window.clipboardData;
                const data = clipboardData.getData('text').replace(/[^0-9]/g, '');

                if (!data) return;

                const chars = data.split('').slice(0, this.length);
                chars.forEach((char, i) => {
                    this.otp[i] = char;
                });

                const nextIndex = Math.min(chars.length, this.length - 1);
                this.focusInput(nextIndex);
                this.sync();
            },

            sync() {
                // 1. Mise à jour de la valeur locale (String)
                this.value = this.otp.join('');

                // 2. CORRECTION : On envoie la String brute, pas d'objet !
                this.$dispatch('otp-changed', this.value);

                if (this.otp.every(char => char !== '')) {
                    this.$dispatch('otp-completed', this.value);
                }
            }
        }"
    >
        <template x-for="(i, index) in length" :key="index">
            <input
                type="text"
                inputmode="numeric"
                pattern="[0-9]*"
                maxlength="2"
                :value="otp[index]"
                @input="handleInput($event, index)"
                @keydown="handleKeydown($event, index)"
                @focus="focusInput(index)"
                autocomplete="one-time-code"
                class="otp-char-input flex h-12 w-10 sm:w-12 items-center justify-center rounded-md border border-slate-200 bg-white text-center text-lg font-bold ring-offset-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:border-slate-800 dark:bg-slate-950 dark:ring-offset-slate-950 dark:text-slate-50 transition-colors"
                :class="{ 'border-red-500 focus-visible:ring-red-500': '<?php echo e($error); ?>' }"
            >
        </template>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $attributes = $__attributesOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__attributesOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416)): ?>
<?php $component = $__componentOriginale59cbfc9fe6826a2536559f28ec4e416; ?>
<?php unset($__componentOriginale59cbfc9fe6826a2536559f28ec4e416); ?>
<?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/CoreUI/resources/views/components/otp-input.blade.php ENDPATH**/ ?>