@extends('layouts.in')
<style>
    .pic p{
        color: #ffffff;
    }
</style>
@section('content')
    <main>
        <div class="cont">
            <div class="showAlbums">
                <h1>Dashboard</h1>
                <div class="showPic">
                    @foreach ($dash as $album)
                        <div class="pic">
                            <img class="image-thumbnail" src="{{ $album->image }}" alt="{{ $album->image_name }}"
                                data-toggle="modal" data-target="#imageModal">
                            <p>Create By  {{ $album->user_name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="expandedImg">
            </div>
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
