@extends('frontend/layout/layout')

@section('htmlschema')
itemscope itemtype="http://schema.org/LocalBusiness
@endsection

@section('seo')
@endsection

@section('json-ld')
@endsection

@section('goodrelations-off')
@endsection

@section('title')
Jeevandeep Prakashan Pvt. Ltd.
@endsection

@section('bodyschema')@endsection
@section('bodytag')@endsection

@section('header_styles')@endsection


@section('content')
<!-- Start Wrapper -->
<div class="wrapper content cf">
	<!-- Start Select School -->
    <div class="select-school cf">
        @include('frontend.layout.jeevandeep.header')
        <div class="select-div">Select State, School Name and Standard</div>
        <div class="please-select">Please select the State, School Name, and Standard for which you wish to purchase online.</div>
        @if(Session::has('error'))
        <div class="flash-message alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="flash-message alert alert-success">
            {{ session('success') }}
        </div>
        @endif
            {!! Form::open(['action' => 'StoreController@selectSchoolPost','class'=>"select-school-drop cf" , 'method' => 'post']) !!}
            <li class="pb15">
            	<label>SELECT STATE</label>
                <a class="btn btn-select btn-select-light nobottommargin">
                    <input type="hidden" class="btn-select-input" id="state" name="state" value="{{Input::old('state')}}" />
                    <span class="btn-select-value">{{Input::old('state')?Input::old('state'):'SELECT STATE'}}</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul>
                        @foreach($state as $st)
                        <li data-id="{{$st->name}}">{{$st->name}}</li>
                        @endforeach
                    </ul>
                   
                </a>
                <div class="errormsg">{{ $errors->first('state') }}</div> 
            </li>
            <li class="pb15">
            	<label>SELECT SCHOOL</label>
                <a class="school_dd btn btn-select btn-select-light nobottommargin disabled">
                    <input type="hidden" class="btn-select-input" id="school" name="school" value="{{Input::old('school')}}" />
                    <span class="btn-select-value school-value">SELECT SCHOOL</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul id="school-option">
                        
                    </ul>
                </a>
                <div class="errormsg">{{ $errors->first('school') }}</div>
            </li>
            <li class="pb15">
            	<label>SELECT STANDARD</label>
                <a class="standard_dd btn btn-select btn-select-light nobottommargin disabled">
                    <input type="hidden" class="btn-select-input" id="standard" name="standard" value="" />
                    <span class="btn-select-value standard-value">SELECT STANDARD</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul id="standard-option">
                    </ul>
                </a>
                <div class="errormsg">{{ $errors->first('standard') }}</div>
            </li>
            <li class="pt20 pb15">
            <button type="submit" class="btn btnS"><i class="fa fa-link"></i>PROCEED</button></li>
        </form>
    </div>
    <!-- End Select School -->
</div>
<!-- End wrapper -->
@endsection

@section('footer_scripts')
<script>
$(document).ready(function () {
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").attr('data-id');
        var text = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value).trigger('change');;
            $(this).find(".btn-select-value").html(text);
        }
    });
    
    $('#state').on('change', function(e){
        $('.errormsg').hide();
        $('.school_dd').removeClass('disabled');
        var state = e.target.value;

        $.get('{{ url('en/information') }}/create/ajax-school?state=' + state, function(data) {
            $('#school-option').empty();
            $('#standard-option').empty();
            $('.school-value').html('SELECT SCHOOL');
            $.each(data, function(index,subCatObj){
                $('#school-option').append('<li data-id="'+subCatObj.id+'">'+subCatObj.name+'</li>');
            });
            $('#school-option').append('<li data-id="not_available" class="italic" style="color:#FF0000">Not Available</li>');
        });
        $('.standard_dd').addClass('disabled');
        $('#standard-option').empty();
        $('.standard-value').html('SELECT STANDARD');
    });
    
    $('#school').on('change', function(e){
        $('.errormsg').hide();
        $('.standard_dd').removeClass('disabled');
        var school_id = e.target.value;
        if(school_id == 'not_available'){
            window.location.href = "{{route('unavailable_school')}}";
        }
        $.get('{{ url('en/information') }}/create/ajax-standard?school_id=' + school_id, function(data) {
            $('#standard-option').empty();
            $('.standard-value').html('SELECT STANDARD');
            $.each(data, function(index,subCatObj){
                $('#standard-option').append('<li data-id="'+subCatObj.id+'">'+subCatObj.name+'</li>');
            });
            $('#standard-option').append('<li data-id="not_available" class="italic" style="color:#FF0000">Not Available</li>');
        });
    });
    @if(Input::old("state"))
         $('#state').change();
         @if(Input::old("school"))
             setTimeout(function(){
                $('#school-option').find('li[data-id="'+'{{Input::old("school")}}'+'"]').addClass('selected');
                $('.school-value').html($('#school-option').find('li[data-id="{{Input::old("school")}}"]').html());
                 $('#school').change();
                 }, 1000);
         @endif
    @endif
    
    $('#standard').on('change', function(e){
        $('.errormsg').hide();
        var standard_id = e.target.value;
        if(standard_id == 'not_available'){
            window.location.href = "{{route('unavailable_standard')}}";
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.attr('data-id');
            var text = target.html();
            $(this).find(".btn-select-input").val(value).trigger('change');;
            $(this).find(".btn-select-value").html(text);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

</script>
@endsection
@section('pp_footer_scripts')@endsection
@section('inlinejs')@endsection