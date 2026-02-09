<section class="wrapper !bg-[#ffffff]">
    <div class="container
    pt-14 xl:pt-[4.5rem] lg:pt-[4.5rem] md:pt-[4.5rem]
    pb-20 xl:pb-24 lg:pb-24 md:pb-24
">
        <div class="flex flex-wrap mx-[-15px] !text-center">
            <div
                class="md:w-10/12 xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!ml-[16.66666667%] lg:!ml-[16.66666667%] md:!ml-[8.33333333%]">
                <h2 class="!text-[0.8rem] uppercase !text-[#5eb9f0] !mb-3 !leading-[1.35] !tracking-[0.02rem]">
                    Проекты
                </h2>
                <h3
                    class="xl:!text-[2.1rem] !text-[calc(1.335rem_+_1.02vw)] !leading-[1.2] !mb-10 xxl:!px-10">
                    Реализованные работы
                </h3>
            </div>
        </div>

        <div
            class="flex flex-wrap mx-[-15px] xl:mx-[-20px] lg:mx-[-20px] !mt-[-50px]">

            @forelse($projects as $project)
                <div
                    class="xl:w-4/12 lg:w-4/12 md:w-6/12 w-full flex-[0_0_auto] xl:!px-[20px] lg:!px-[20px] !px-[15px] !mt-[50px] max-w-full">

                    <div class="project item">
                        @if($project->preview_image)
                            <figure class="lift rounded !mb-6 overflow-hidden">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                   class="block relative w-full aspect-[4/3]">

                                    <img
                                        src="{{ asset('storage/' . $project->preview_image) }}"
                                        alt="{{ $project->title }}"
                                        class="absolute inset-0 w-full h-full object-cover"
                                    >
                                </a>
                            </figure>
                        @endif

                        <div class="project-details text-center">
                            <h3 class="post-title !mb-2">
                                <a href="{{ route('projects.show', $project->slug) }}">
                                    {{ $project->title }}
                                </a>
                            </h3>

                            @if($project->excerpt)
                                <p class="!mb-4">
                                    {{ $project->excerpt }}
                                </p>
                            @endif

                            <a
                                href="{{ route('projects.show', $project->slug) }}"
                                class="more hover"
                            >
                                Подробнее
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="w-full text-center !mt-10 text-[#aab0bc]">
                    Проекты пока не добавлены
                </div>
            @endforelse

        </div>
    </div>
</section>
