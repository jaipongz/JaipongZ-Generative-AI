@extends('layouts.in')
<style>

</style>
@section('content')
    <main>
        <div class="cont">
            <form id="imageForm" action="{{ route('savepic', ['user_id' => Auth::user()->id]) }}" method="post">
                @csrf
                <input type="hidden" id="imageData" name="imageData">
                <div class="show">
                    <h1>Result Packaging</h1>
                    <img id="imagePreview" name="images" src="{{ $filePath }}" alt="">
                </div>
                <div class="actions">
                    <button type="submit" class="save" onclick="saveImage()">บันทึก</button>
                    <a onclick="reloadPage(),showLoadder()" class="new">ลองใหม่</a>
                </div>
            </form>
        </div>


    </main>
    <script>
        function showLoadder() {
            document.getElementById('container').style.display = "none";
            document.getElementById('loadder').style.display = "block";
        }

        function reloadPage() {
            window.location.reload();
        }

        function saveImage() {
            var imageData = document.getElementById('imagePreview').src;
            document.getElementById('imageData').value = imageData;
            var formData = new FormData(document.getElementById('imageForm'));
            $.ajax({
                url: "{{ route('savepic', ['user_id' => Auth::user()->id]) }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
