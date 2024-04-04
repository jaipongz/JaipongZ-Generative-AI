@extends('layouts.in')
<style>
    
</style>
@section('content')
    <main>
        <div class="cont">
            <form id="imageForm" action="{{route('savepic',['user_id' => Auth::user()->id])}}" method="post" action="/upload" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="imageData" name="imageData" >
                <div class="show">
                    <h1>Result</h1>
                    <img id="imagePreview" src="{{asset('images/beer.jpeg')}}" alt="">
                </div>
                <div class="actions">
                    <button type="submit" class="save" onclick="saveImage()">บันทึก</button>
                    <a href="{{ route('logo') }}" class="new">ลองใหม่</a>
                </div>
            </form>
        </div>
    </main>

    <script>
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
