<section class="py-20 bg-white">
    <div class="container mx-auto px-4">

        <div class="flex flex-wrap mx-[-15px] !text-center">
            <div
                class="md:w-10/12 xl:w-8/12 lg:w-8/12 w-full flex-[0_0_auto] !px-[15px] max-w-full xl:!ml-[16.66666667%] lg:!ml-[16.66666667%] md:!ml-[8.33333333%]">
                <h2 class="!text-[0.8rem] uppercase !text-[#5eb9f0] !mb-3 !leading-[1.35] !tracking-[0.02rem]">
                    Статьи
                </h2>
                <h3
                    class="xl:!text-[2.1rem] !text-[calc(1.335rem_+_1.02vw)] !leading-[1.2] !mb-10 xxl:!px-10">
                    Недавние публикации
                </h3>
            </div>
        </div>

        <div class="flex flex-wrap items-stretch -mx-5">
            @foreach($articles as $article)
                <article
                    class="item post xl:w-4/12 lg:w-4/12 md:w-4/12 w-full flex-[0_0_auto]
               xl:!px-[20px] lg:!px-[20px] md:!px-[20px]
               !mt-[40px] !px-[15px] max-w-full">

                    <div class="card h-full flex flex-col">

                    {{-- IMAGE --}}
                        <figure class="card-img-top overlay overlay-1 hover-scale group
                   h-[400px] overflow-hidden rounded-t-lg">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                <img
                                    src="{{ asset('storage/' . $article->preview_image) }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-full object-cover
                       !transition-all !duration-[0.35s] !ease-in-out
                       group-hover:scale-105"
                                >
                                <span class="bg"></span>
                            </a>

                            <figcaption class="group-hover:opacity-100 absolute inset-0
                           opacity-0 text-center z-[5] pointer-events-none">
                                <h5 class="from-top absolute w-full top-1/2 -translate-y-1/2">
                                    Читать
                                </h5>
                            </figcaption>
                        </figure>


                        {{-- BODY --}}
                        <div class="card-body flex-1
                        p-[40px]
                        xl:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        lg:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        md:!p-[1.75rem_1.75rem_1rem_1.75rem]
                        max-md:pb-4">

                            <div class="post-header !mb-[.9rem]">

                                {{-- CATEGORY (пока статично, можно заменить позже) --}}
                                <div
                                    class="inline-flex !mb-[.4rem] uppercase !tracking-[0.02rem]
                               text-[0.7rem] font-bold !text-[#aab0bc]
                               relative align-top !pl-[1.4rem]
                               before:content-['']
                               before:absolute
                               before:inline-block
                               before:translate-y-[-60%]
                               before:w-3 before:h-[0.05rem]
                               before:left-0 before:top-2/4
                               before:bg-[#3f78e0]">
                                    Статья
                                </div>

                                {{-- TITLE --}}
                                <h2 class="post-title h3 !mt-1 !mb-3">
                                    <a
                                        class="!text-[#343f52] hover:!text-[#3f78e0]"
                                        href="{{ route('articles.show', $article->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($article->title, 40) }}
                                    </a>
                                </h2>
                            </div>

                            {{-- EXCERPT --}}
                            <div class="!relative">
                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt), 80) }}
                                </p>
                            </div>
                        </div>

                        {{-- FOOTER --}}
                        <div class="card-footer mt-auto
                       xl:!p-[1.25rem_1.75rem_1.25rem]
                       lg:!p-[1.25rem_1.75rem_1.25rem]
                       md:!p-[1.25rem_1.75rem_1.25rem]
                       p-[18px_40px]">

                            <ul class="!text-[0.7rem] !text-[#aab0bc] m-0 p-0 list-none flex !mb-0">

                                {{-- DATE --}}
                                <li class="post-date inline-block">
                                    <i class="uil uil-calendar-alt pr-[0.2rem] align-[-.05rem]"></i>
                                    <span>{{ $article->created_at->format('d M Y') }}</span>
                                </li>

                                {{-- READ --}}
                                <li
                                    class="post-comments inline-block
                               before:content-['']
                               before:inline-block
                               before:w-[0.2rem]
                               before:h-[0.2rem]
                               before:opacity-50
                               before:m-[0_.6rem_0]
                               before:rounded-[100%]
                               before:align-[.15rem]
                               before:bg-[#aab0bc]">
                                    <a
                                        class="!text-[#aab0bc] hover:!text-[#3f78e0]"
                                        href="{{ route('articles.show', $article->slug) }}">
                                        Читать →
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
