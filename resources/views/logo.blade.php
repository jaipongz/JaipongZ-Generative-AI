@extends('layouts.in')
<style>

</style>
@section('content')
    <main>
        @if ($errors->any())
            <script>
                // แสดง pop-up เมื่อหน้าเว็บโหลด
                window.onload = function() {
                    alert("{{ $errors->first() }}");
                };
            </script>
        @endif
        <div class="logos">
            <div class="ver">
                <h2>Choose Youre Stlyes <span>Free</span></h2>
            </div>
            <form action="{{ route('getlogo', ['user_id' => Auth::user()->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <h2>Topics</h2>
                <div class="topic">
                    <select name="topic" placeholder="prompt">
                        <option value="a cow in logo">วัว</option>
                        <option value="a dog in logo,cartoon style">หมา</option>
                        <option value="a cat in logo">แมว</option>
                        <option value="a goat in logo">แพะ</option>
                        <option value="a monky in logo">ลิง</option>
                        <option value="chicken in logo">ไก่</option>
                        <option value="pig in logo">หมู</option>
                        <option value="lion in logo">สิงโต</option>
                        <option value="tiger in logo">เสือ</option>
                    </select>
                    
                    <select name="style" id="">
                        <option value="art">ภาพพวาด</option>
                        <option value="photorealism">สมจริง</option>
                        <option value="anime">การ์ตูน</option>
                    </select>
                
                </div>


                <h2>Templates</h2>
                <div class="model">
                    <input type="radio" name="model" id="circle" value="circle logo">
                    <label for="circle">
                        <img src="{{ asset('images/pattern/circle.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="square" value="square logo">
                    <label for="square">
                        <img src="{{ asset('images/pattern/square.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="triangle" value="Triangular logo">
                    <label for="triangle">
                        <img src="{{ asset('images/pattern/triangle.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="penta" value="Pentagonal logo">
                    <label for="penta">
                        <img src="{{ asset('images/pattern/penta.png') }}" alt="" tabindex="1">
                    </label>
                    

                </div>
                @error('model')
                    <div class="error">กรุณาเลือก Template</div>
                @enderror
                <h2>Colors</h2>
                <div class="tone">
                    <select name="color" placeholder="โทนสี">
                        <option value="pink tone logo">ชมพู</option>
                        <option value="red tone logo">แดง</option>
                        <option value="blue sky tone logo">ฟ้า</option>
                        <option value="green tone logo">เขียว</option>
                        <option value="yellow tone logo">เหลือง</option>
                        <option value="orange tone logo">ส้ม</option>
                        <option value="purple tone logo">ม่วง</option>
                        <option value="golden tone logo">ทอง</option>
                        <option value="gray tone logo">เทา</option>
                        <option value="cream tone logo">ครีม</option>

                    </select>
                </div>
                <button type="submit" id="sub" onclick="showLoadder()">
                    <span> Generate</span>
                </button>
            </form>



        </div>
        <script>
            function showLoadder() {
                document.getElementById('container').style.display = "none";
                document.getElementById('loadder').style.display = "block";
            }
        </script>
    </main>
@endsection
