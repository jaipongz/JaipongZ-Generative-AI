@extends('layouts.in')
<style>

</style>
@section('content')
    <main>
        <div class="cont">
            <div class="showAlbums">
                <h1>Albums</h1>
                <div class="showPic">
                    @foreach ($albums as $album)
                        <div class="pic">
                            <img class="image-thumbnail" src="{{ $album->image }}" alt="{{ $album->image_name }}"
                                data-toggle="modal" data-target="#imageModal" class="image-thumbnail">
                            {{-- <p>{{ $album->image_name }}</p> --}}
                            <div class="tools">
                                <form
                                    action="{{ route('destroy', ['image' => $album->image_id, 'id' => $album->user_id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button onclick="return confirm('Are you sure to Delete?')">Delete</button>
                                    @method('GET')
                                </form>
                                {{-- <a class="upload"
                                    href="{{ route('upload', ['user_name' => Auth::user()->name, 'image' => $album->image,'user_id' => $album->user_id]) }}"><span
                                        class="material-symbols-outlined">
                                        ios_share
                                    </span></a> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="expandedImg">
            </div>

            @if ($errors->any())
                <script>
                    // แสดง pop-up เมื่อหน้าเว็บโหลด
                    window.onload = function() {
                        alert("{{ $errors->first() }}");
                    };
                </script>
            @endif

        </div>
        <script>
            var modal = document.getElementById("imageModal");

            var images = document.getElementsByClassName('image-thumbnail');
            var modalImg = document.getElementById("expandedImg");
            for (var i = 0; i < images.length; i++) {
                images[i].onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                }
            }

            function closeModal() {
                var modal = document.getElementById('imageModal');
                modal.style.display = 'none';
            }
        </script>
    </main>
@endsection
