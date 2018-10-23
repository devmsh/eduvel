@include('website.layouts.header')

<!-- SPECIFIC CSS -->
<link href="{{ url('/design/educationalzard') }}/css/blog.css" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="{{ url('/design/educationalzard') }}/css/custom.css" rel="stylesheet">

@include('website.layouts.menu')

<main>
    <section id="hero_in" class="general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Education blog</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="bloglist singlepost">
                    <p><img alt="" class="img-fluid" src="{{ asset('uplaod/posts/'.$post->image) }}"></p>
                    <h1>{{ $post->title }}</h1>
                    <div class="postmeta">
                        <ul>
                            <li>
                                <a href="#"><i class="icon_folder-alt"></i>
                                    @foreach($categories as $category)
                                        @if($category->id == $post->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </a>
                            </li>
                            <li><a href="#"><i
                                            class="icon_clock_alt"></i> {{ $post->created_at->toDayDateTimeString() }}
                                </a></li>
                            <li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li>
                            <li><a href="#"><i class="icon_comment_alt"></i> ( {{ count($id->blog_comments) }} )
                                    Comments</a></li>
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">
                        <div class="dropcaps">
                            <p>{!! $post->description !!}.</p>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <!-- /single-post -->

                <div id="comments">
                    <h5>Comments</h5>

                    <ul>
                        @foreach($id->blog_comments as $comm)
                            @if($comm->reply_id == null)
                                <li>
                                    <div class="avatar">
                                        <a href="#"><img src="{{ asset('design/educationalzard/img/user-image.png') }}"
                                                         alt="">
                                        </a>
                                    </div>
                                    <div class="comment_right clearfix">
                                        <div class="comment_info">
                                            By
                                            <a href="{{ $comm->website }}">{{ $comm->name }}</a><span>|</span>{{ $comm->created_at->toDateString() }}
                                            <span>|</span><a href="?reply={{ $comm->id }}">Reply</a> <span
                                                    class="float-right">{{ \Carbon\Carbon::parse($comm->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <p>
                                            {{ $comm->comment }}.
                                        </p>
                                    </div>
                                    <ul class="replied-to">
                                        <?php
                                        $comm_son = DB::table('blog_comments')->where('reply_id', $comm->id)->get();

                                        for ($i = 0; $i < count($comm_son); $i++) { ?>

                                        <li>
                                            <div class="avatar">
                                                <a href="#"><img
                                                            src="{{ asset('design/educationalzard/img/user-image-1.jpg') }}"
                                                            alt="">
                                                </a>
                                            </div>
                                            <div class="comment_right clearfix">
                                                <div class="comment_info">
                                                    By
                                                    <a href="#">{{ $comm_son[$i]->name }}</a><span>|</span>{{ $comm_son[$i]->created_at }}
                                                    <span>|</span><a href="?reply={{	$id = $comm_son[$i]->id }}">Reply</a>
                                                    <span class="float-right">{{ \Carbon\Carbon::parse($comm_son[$i]->created_at)->diffForHumans() }}</span>
                                                </div>
                                                <p> {!! $comm_son[$i]->comment !!}. </p>
                                            </div>
                                            <ul class="replied-to">
                                                <?php
                                                $comm_grandson = DB::table('blog_comments')->where('reply_id', $comm_son[$i]->id)->get();

                                                for ($i = 0; $i < count($comm_grandson); $i++) { ?>
                                                <li>
                                                    <div class="avatar">
                                                        <a href="#"><img
                                                                    src="{{ asset('design/educationalzard/img/user-image-1.jpg') }}"
                                                                    alt="">
                                                        </a>
                                                    </div>
                                                    <div class="comment_right clearfix">
                                                        <div class="comment_info">
                                                            By
                                                            <a href="#">{{ $comm_grandson[$i]->name }}</a><span>|</span>{{ $comm_grandson[$i]->created_at }}
                                                            <span>|</span><a href="?reply={{ $id }}">Reply</a> <span
                                                                    class="float-right">{{ \Carbon\Carbon::parse($comm_grandson[$i]->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                        <p> {!! $comm_grandson[$i]->comment !!} </p>
                                                    </div>
                                                </li>
                                                <?php } ?>

                                            </ul>

                                        </li>
                                        <?php } /* print($get); */ ?>
                                    </ul>
                                </li>
                            @endif



                        @endforeach
                    </ul>
                </div>

                <hr>

                <h5 id="#reply">Leave a Comment</h5>
                <form action="/blog/comment-store" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    @if(isset($_GET['reply']))
                        <input type="hidden" name="reply_id" value="{{ $_GET['reply'] }}">
                    @endif
                    <div class="form-group">
                        <input type="text" name="name" id="name2" class="form-control" placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email2" class="form-control" placeholder="Email"
                               required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="website" id="website3" class="form-control" placeholder="Website"
                               required="">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" id="comments2" rows="6"
                                  placeholder="Message Below" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit2" class="btn_1 rounded add_bottom_30"> Submit</button>
                    </div>
                </form>
            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget">
                    <form action="/blog/search" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="search" id="search" class="form-control" value=""
                                   placeholder="Search...">
                        </div>
                        <button type="submit" id="submit" class="btn_1 rounded"> Search</button>
                    </form>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Recent Posts</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach($posts as $post)
                            <li>
                                <div class="alignleft">
                                    <a href="{{ url('/blog/blog-post/'.$post->id) }}"><img
                                                src="{{ asset('uplaod/posts/'.$post->image) }}" alt=""></a>
                                </div>
                                <small>{{ $post->created_at->toDayDateTimeString() }}</small>
                                <h3><a href="{{ url('/blog/blog-post/'.$post->id) }}"
                                       title="">{!! substr($post->title, 0, 50) !!} ...</a></h3>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Blog Categories</h4>
                    </div>
                    <ul class="cats">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ url('/blog/category/'.$category->id) }}">{{ $category->name }}
                                    <span>( {{ count($category->posts) }} )</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Popular Tags</h4>
                    </div>
                    <div class="tags">
                        <a href="#">Information tecnology</a>
                        <a href="#">Students</a>
                        <a href="#">Community</a>
                        <a href="#">Carreers</a>
                        <a href="#">Literature</a>
                        <a href="#">Seminars</a>
                    </div>
                </div>
                <!-- /widget -->
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->


@include('website.layouts.footer')