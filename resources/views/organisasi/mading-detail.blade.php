@extends('layouts.main')
@section('container')
    <style>
        /* Style the Image Used to Trigger the Modal */
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- breadcrumb start -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/organisasi">Mading Organisasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mading Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- courses detail section start -->
    <section class="course-details section-padding mt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- course header start -->
                    <div class="course-header box">
                        <h2 class="text-capitalize">{{ $organisasis->judul }}</h2>
                        <ul>
                            <li>Created by &nbsp; - <span><a href="#">{{ $organisasis->created_at }}</a> </span>
                            </li>
                            <li>Last Update &nbsp;- <span><a href="#">{{ $organisasis->updated_at }}</a></span>
                            </li>
                        </ul>
                    </div>
                    <!-- course header end -->

                    <!-- course tabs start -->
                    <nav class="course-tabs">
                        <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Deskripsi</button>
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </div>
                    </nav>
                    <!-- course tabs end   -->

                    <!-- tabs panes start -->
                    <div class="tab-content" id="nav-tabContent">

                        <!-- deskripsi start -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="deskripsi box">
                                <h3 class="text-capitalize mb-4"> {{ $organisasis->judul }} </h3>

                                <!-- accordion start -->
                                <div class="accordion" id="accordion">
                                    <!-- accordion item start -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-1" aria-expanded="true"
                                                aria-controls="collapse-1">
                                                About
                                            </button>
                                        </h2>
                                        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                {!! $organisasis->deskripsi !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- accordion item end -->
                                </div>
                                <!-- accordion end -->

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="contact box">
                                <h3 class="text-capitalize mb-4">Contact</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia
                                    voluptatem minus.</p>
                                <ul>
                                    <li><i class="fas fa-envelope social-icon"></i> &nbsp; &nbsp;
                                        <a href="">{{ $organisasis->email }}</a>
                                    </li>
                                    <li><i class="fab fa-whatsapp social-icon"></i> &nbsp; &nbsp;
                                        <a href="">{{ $organisasis->whatsapp }}</a>
                                    </li>
                                    <li><i class="fab fa-instagram social-icon"></i> &nbsp;
                                        &nbsp; <a href="">{{ $organisasis->instagram }}</a></li>
                                    <li><i class="fas fa-link social-icon"></i> &nbsp;
                                        &nbsp;<a href="{{ $organisasis->link }}">{{ $organisasis->link }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- tabs panes end -->
                </div>


                <div class="col-lg-4">
                    <!-- course sidebar start -->
                    <div class="course-sidebar box">
                        <div class="courses-item">
                            <div class="courses-item-inner">
                                <img id="myImg" src="{{ asset('storage/' . $organisasis->image) }}"" alt="
                                    {{ $organisasis->judul }}" style="width:100%;max-width:600px">
                                <!-- The Modal -->
                                <div id="myModal" class="modal">

                                    <!-- The Close Button -->
                                    <span class="close">&times;</span>

                                    <!-- Modal Content (The Image) -->
                                    <img class="modal-content" id="img01">

                                    <!-- Modal Caption (Image Text) -->
                                    <div id="caption"></div>
                                </div>
                                <h3 class="title">{{ $organisasis->judul }}</h3>
                                <div class="instructor">
                                    <i class="fas fa-user-circle social-icon" style="font-size: 16px"></i>
                                    &nbsp;
                                    <span class="instructor-name">{{ $organisasis->pengirim }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- course sidebar end -->
                </div>
            </div>
        </div>
    </section>

    <div class="footer-bottom">
        <div class="container">
            <p class="m-0 py-4 text-center">copyright &copy;2022 Mading Kita</p>
        </div>
    </div>
    </footer>

    <!-- header end -->
    </div>
    <!-- main wrapper end -->

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endsection


Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium odio harum debitis illo. Ullam, temporibus repellat excepturi sunt at fugiat! Quisquam cumque repellendus iusto delectus ducimus architecto eius distinctio dolorum nostrum. Quaerat nobis fugit ducimus provident dolore optio aliquid, earum ipsa ab, maiores labore cumque neque adipisci amet repellendus quis repellat beatae cupiditate totam sapiente minima eos. Illum veritatis deleniti culpa voluptatum neque quibusdam fugiat sapiente sint perspiciatis cupiditate reprehenderit at iste obcaecati sunt debitis excepturi maiores molestiae aperiam explicabo magni corporis provident, voluptatibus quia! Iusto enim obcaecati unde nisi error corporis, expedita dolores culpa quia. Quod doloremque quasi sint!

Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus reprehenderit nostrum odit. Dicta assumenda doloremque facere consequatur fugit reprehenderit doloribus.