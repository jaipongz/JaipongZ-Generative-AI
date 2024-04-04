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
                <h2>Choose Youre Packaging Stlyes <span>Free</span></h2>
            </div>
            <form action="{{ route('getpackage', ['user_id' => Auth::user()->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <h2>Topics</h2>
                <div class="topic">
                    <select name="topic" placeholder="prompt">
                        <option value="There is a cow logo on the packaging">วัว</option>
                        <option value="There is a dog logo on the packaging">หมา</option>
                        <option value="There is a cat logo on the packaging">แมว</option>
                        <option value="There is a goat logo on the packaging">แพะ</option>
                        <option value="There is a monky logo on the packaging">ลิง</option>
                        <option value="There is a chicken logo the on packaging">ไก่</option>
                        <option value="There is a pig logo on the the packaging">หมู</option>
                        <option value="There is a lion logo on the packaging">สิงโต</option>
                        <option value="There is a tiger logo on the packaging">เสือ</option>
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
                    <input type="radio" name="model" id="can" value="a aluminium can packaging">
                    <label for="can">
                        <img src="{{ asset('images/pattern/can.png') }}" alt="" tabindex="1">
                    </label>
                    <input type="radio" name="model" id="cup" value="a plastic cup packaging">
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
