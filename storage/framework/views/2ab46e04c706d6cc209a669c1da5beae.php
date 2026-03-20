<?php if (isset($component)) { $__componentOriginalae18524f0320527e26bec58d05c014c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae18524f0320527e26bec58d05c014c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'coreui::components.card','data' => ['class' => 'p-6 border-0 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 rounded-2xl bg-white dark:bg-slate-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('coreui::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-6 border-0 shadow-sm ring-1 ring-slate-200 dark:ring-slate-700 rounded-2xl bg-white dark:bg-slate-800']); ?>

    
    <div class="flex flex-col xl:flex-row justify-between items-start xl:items-center gap-6 mb-6">

        
        <div class="flex items-center gap-4">
            <div class="p-2 bg-sky-50 dark:bg-sky-900/20 rounded-xl text-sky-600 ring-1 ring-sky-100 dark:ring-sky-800">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($metric === 'duration'): ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-clock'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <?php else: ?> <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-chart-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="flex bg-slate-100 dark:bg-slate-900 p-1 rounded-lg">
                <button wire:click="setMetric('count')"
                        class="px-3 py-1.5 text-xs font-bold rounded-md transition-all <?php echo e($metric === 'count' ? 'bg-white dark:bg-slate-700 text-sky-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'); ?>">
                    Volume
                </button>
            </div>
        </div>

        
        <div class="flex flex-col sm:flex-row items-end sm:items-center gap-3 w-full xl:w-auto">

            
            <div class="flex bg-slate-100 dark:bg-slate-900 p-1 rounded-lg">
                <button wire:click="setLayer1('all')" title="Tout le monde"
                        class="px-3 py-1.5 text-xs font-bold rounded-md transition-all <?php echo e($layer1 === 'all' ? 'bg-white dark:bg-slate-700 text-slate-800 dark:text-white shadow-sm' : 'text-slate-500'); ?>">
                    Tous
                </button>
                <button wire:click="setLayer1('human')" title="Uniquement Humains"
                        class="px-3 py-1.5 text-xs font-bold rounded-md transition-all <?php echo e($layer1 === 'human' ? 'bg-white dark:bg-slate-700 text-sky-600 shadow-sm' : 'text-slate-500'); ?>">
                    Humains
                </button>
                <button wire:click="setLayer1('bot')" title="Uniquement Robots"
                        class="px-3 py-1.5 text-xs font-bold rounded-md transition-all <?php echo e($layer1 === 'bot' ? 'bg-white dark:bg-slate-700 text-amber-600 shadow-sm' : 'text-slate-500'); ?>">
                    Robots
                </button>
            </div>

            <div class="hidden sm:block w-px h-6 bg-slate-200 dark:bg-slate-700"></div>

            
            <div class="relative min-w-[180px]">
                <select wire:model.live="layer2"
                        class="w-full text-xs font-bold py-2 pl-3 pr-8 rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-900 focus:ring-sky-500 cursor-pointer text-slate-700 dark:text-slate-300 shadow-sm">
                    <option value="all">Tous les types</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $availableTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type); ?>">
                            <?php echo e(class_basename($type)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($layer2 !== 'all'): ?>
                    <div class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-sky-500 rounded-full border-2 border-white dark:border-slate-800"></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <button wire:click="$refresh" class="ml-2 text-slate-400 hover:text-sky-600 transition p-1.5">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','wire:loading.class' => 'animate-spin']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            </button>
        </div>
    </div>

    
    <div
        wire:ignore
        x-data="authTrafficChart({
            data: <?php if ((object) ('chartData') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartData'->value()); ?>')<?php echo e('chartData'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartData'); ?>')<?php endif; ?>,
            dark: document.documentElement.classList.contains('dark')
        })"
        class="relative w-full h-[300px]"
    >
        <div x-ref="chart" class="w-full h-full"></div>
        <div wire:loading.flex class="absolute inset-0 bg-white/50 dark:bg-slate-800/50 backdrop-blur-[1px] flex items-center justify-center z-10 rounded-xl">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-path'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 text-sky-500 animate-spin']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
        </div>
    </div>

    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('authTrafficChart', (config) => ({
                chart: null,
                data: config.data,
                isDark: config.dark,

                init() {
                    if (typeof ApexCharts === 'undefined') return;
                    this.$watch('data', (newData) => this.update(newData));
                    if (this.data && this.data.series) this.mount();
                },

                mount() {
                    let options = {
                        series: this.data.series,
                        chart: {
                            type: 'area',
                            height: 300,
                            fontFamily: 'inherit',
                            toolbar: { show: false },
                            animations: { enabled: true, easing: 'easeinout', speed: 800 },
                            background: 'transparent'
                        },
                        // Sky-500 (#0ea5e9) pour succès, Rose-500 (#f43f5e) pour échecs
                        colors: ['#0ea5e9', '#f43f5e'],
                        fill: {
                            type: 'gradient',
                            gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 100] }
                        },
                        dataLabels: { enabled: false },
                        stroke: { curve: 'smooth', width: 2 },
                        xaxis: {
                            categories: this.data.labels,
                            labels: {
                                style: {
                                    colors: this.isDark ? '#94a3b8' : '#64748b',
                                    fontSize: '10px'
                                }
                            },
                            axisBorder: { show: false },
                            axisTicks: { show: false },
                            crosshairs: { show: true, stroke: { color: '#0ea5e9', dashArray: 3 } }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: this.isDark ? '#94a3b8' : '#64748b',
                                    fontSize: '10px'
                                }
                            }
                        },
                        grid: {
                            borderColor: this.isDark ? '#334155' : '#f1f5f9',
                            strokeDashArray: 4,
                            padding: { left: 10, right: 0 }
                        },
                        tooltip: {
                            theme: this.isDark ? 'dark' : 'light',
                            y: { formatter: (val) => val + (this.data.unit || '') }
                        },
                        legend: { position: 'top', fontWeight: 600 }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                },

                update(newData) {
                    if (!this.chart || !newData) return;
                    this.chart.updateOptions({
                        xaxis: { categories: newData.labels },
                        series: newData.series,
                        tooltip: { y: { formatter: (val) => val + (newData.unit || '') } }
                    });
                }
            }));
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae18524f0320527e26bec58d05c014c4)): ?>
<?php $attributes = $__attributesOriginalae18524f0320527e26bec58d05c014c4; ?>
<?php unset($__attributesOriginalae18524f0320527e26bec58d05c014c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae18524f0320527e26bec58d05c014c4)): ?>
<?php $component = $__componentOriginalae18524f0320527e26bec58d05c014c4; ?>
<?php unset($__componentOriginalae18524f0320527e26bec58d05c014c4); ?>
<?php endif; ?>
<?php /**PATH /home/athanor/Documents/PhpstormProjects/Hope/Modules/Logs/resources/views/livewire/auth/global-stats/traffic-chart.blade.php ENDPATH**/ ?>