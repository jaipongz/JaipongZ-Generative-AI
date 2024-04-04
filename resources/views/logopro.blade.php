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
                <h2>Choose Youre Stlyes <span>Pro</span></h2>
            </div>
            <form action="{{ route('getlogopro', ['user_id' => Auth::user()->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <h2>Topics</h2>
                <div class="topic">
                    <select name="topic" placeholder="prompt">
                        <option value="a cow logo">วัว</option>
                        <option value="a dog logo">หมา</option>
                        <option value="a cat logo">แมว</option>
                        <option value="a goat logo">แพะ</option>
                        <option value="a monky logo">ลิง</option>
                        <option value="a chicken logo">ไก่</option>
                        <option value="a pig logo">หมู</option>
                        <option value="a lion logo">สิงโต</option>
                        <option value="a tiger logo">เสือ</option>
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
                    <input type="radio" name="model" id="triangle" value="triangle logo">
                    <label for="triangle">
                        <img src="{{ asset('images/pattern/triangle.png') }}" alt="" tabindex="1">
                    </label>

                </div>
                @error('model')
                    <div class="error">กรุณาเลือก Template</div>
                @enderror
                <h2>Colors</h2>
                <div class="tone">
                    <input type="color" name="tone">
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
