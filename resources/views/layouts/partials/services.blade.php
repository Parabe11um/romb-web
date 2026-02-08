<section class="wrapper bg-gradient-sky">
    <div class="container pt-14 xl:pt-8 lg:pt-8 pb-[4.5rem] xl:pb-28 lg:pb-28 md:pb-28">
        <div class="flex flex-wrap mx-[-15px] !text-center">
            <div
                class="md:w-10/12 xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!ml-[16.66666667%] lg:!ml-[16.66666667%] md:!ml-[8.33333333%]">
                <h2 class="!text-[0.8rem] uppercase !text-[#5eb9f0] !mb-3 !leading-[1.35] !tracking-[0.02rem]">Услуги</h2>
                <h3 class="xl:!text-[2.1rem] !text-[calc(1.335rem_+_1.02vw)] !leading-[1.2] !mb-10 xxl:!px-10">Полный комплекс digital-услуг</h3>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div
            class="flex flex-wrap mx-[-15px] xl:mx-[-35px] lg:mx-[-20px] !mt-[-60px] xxl:!px-5 !text-center items-end">

            @foreach($services as $service)
                <div
                    class="xl:w-4/12 lg:w-4/12 w-full flex-[0_0_auto] xl:!px-[35px] lg:!px-[20px] !px-[15px] max-w-full !mt-[60px]">

                    <div class="md:!px-20 lg:!px-3 xl:!px-3">

                        @if($service->image)
                            <figure class="!mb-6">
                                <img
                                    class="img-auto mx-auto"
                                    src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->title }}">
                            </figure>
                        @endif

                        <h3>{{ $service->title }}</h3>

                        <p class="!mb-2">
                            {{ $service->excerpt }}
                        </p>

                        <a href="{{ route('services.show', $service) }}" class="more hover">
                            Подробнее
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
