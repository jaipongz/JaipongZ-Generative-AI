@extends('layouts.admin')
<style>
    .pic p{
        color: #ffffff;
    }
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
                                data-toggle="modal" data-target="#imageModal">
                            
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
