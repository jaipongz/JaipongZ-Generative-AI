@extends('layouts.in')
<style>

</style>
@section('content')
    <main>
        <div class="cont">
            <form action="{{ route('savepicpro', ['user_id' => Auth::user()->id]) }}" method="post">
                @csrf
                <input type="hidden" id="imageData" name="imageData">

                <div class="show">
                    <h1>Result Pro</h1>
                    {{-- {{dd($filePath)}} --}}
                    @foreach ($images as $image)
                        <img id="imagePreview" name="images" src="{{ $image }}" alt="">
                        {{-- <p>{{ $image}}</p> --}}
                    @endforeach
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
            // ดึงข้อมูลรูปภาพจาก tag img
            var imageData = document.getElementById('imagePreview').src;

            // กำหนดค่าข้อมูลรูปภาพให้กับ input hidden
            document.getElementById('imageData').value = imageData;

            // ส่งข้อมูลไปยังเซิร์ฟเวอร์โดยใช้ AJAX
            var formData = new FormData(document.getElementById('imageForm'));
            $.ajax({
                url: "{{ route('savepic', ['user_id' => Auth::user()->id]) }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // การดำเนินการหลังจากบันทึกสำเร็จ
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // การจัดการข้อผิดพลาด
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
