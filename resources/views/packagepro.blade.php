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
            <div class="verpro">
                <h2>Choose Youre Packaging Stlyes <span>Pro</span></h2>
            </div>
            <form action="{{ route('getpackagepro', ['user_id' => Auth::user()->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <h2>Topics</h2>
                <div class="topic">
                    <select name="topic" placeholder="prompt">
                        <option value="with cow logo">วัว</option>
                        <option value="with dog logo">หมา</option>
                        <option value="with cat logo">แมว</option>
                        <option value="with goat logo">แพะ</option>
                        <option value="with monky logo">ลิง</option>
                        <option value="with chicken logo">ไก่</option>
                        <option value="with pig logo">หมู</option>
                        <option value="with lion logo">สิงโต</option>
                        <option value="with tiger logo">เสือ</option>
                    </select>
                </div>


                <h2>Templates</h2>
                <div class="package">
                    <input type="radio" name="model" id="box" value="a box packaging">
                    <label for="box">
                        <img src="{{ asset('images/pattern/box.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="bottle" value="a bottle packaging">
                    <label for="bottle">
                        <img src="{{ asset('images/pattern/bottle.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="can" value="a can packaging">
                    <label for="can">
                        <img src="{{ asset('images/pattern/can.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="cup" value="a cup packaging">
                    <label for="cup">
                        <img src="{{ asset('images/pattern/cup.png') }}" alt="" tabindex="1">
                    </label>


                </div>
                @error('model')
                    <div class="error">กรุณาเลือก Template</div>
                @enderror
                <h2>Colors</h2>
                <div class="tone">
                    <select name="color" placeholder="โทนสี">
                        <option value="pink tone packaging">ชมพู</option>
                        <option value="red tone packaging">แดง</option>
                        <option value="blue sky tone packaging">ฟ้า</option>
                        <option value="green tone packaging">เขียว</option>
                        <option value="yellow tone packaging">เหลือง</option>
                        <option value="orange tone packaging">ส้ม</option>
                        <option value="purple tone packaging">ม่วง</option>
                        <option value="golden tone packaging">ทอง</option>
                        <option value="gray tone packaging">เทา</option>
                        <option value="cream tone packaging">ครีม</option>

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
