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
        
            {!! Form::open(['action' => 'StoreController@selectSchoolPost','class'=>"select-school-drop cf" , 'method' => 'post']) !!}
        	<li>
            	<label>SELECT STATE</label>
                <div class="errormsg pull-right">{{ $errors->first('state') }}</div>
                <a class="btn btn-select btn-select-light">
                    <input type="hidden" class="btn-select-input" id="state" name="state" value="{{Input::old('state')}}" />
                    <span class="btn-select-value">{{Input::old('state')?Input::old('state'):'SELECT STATE'}}</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul>
                        @foreach($state as $st)
                        <li data-id="{{$st->name}}">{{$st->name}}</li>
                        @endforeach
                    </ul>
                   
                </a>
                 
            </li>
            <li>
            	<label>SELECT SCHOOL</label>
                <div class="errormsg pull-right">{{ $errors->first('school') }}</div>
                <a class="btn btn-select btn-select-light">
                    <input type="hidden" class="btn-select-input" id="school" name="school" value="{{Input::old('school')}}" />
                    <span class="btn-select-value school-value">SELECT SCHOOL</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul id="school-option">
                        
                    </ul>
                </a>
            </li>
            <li>
            	<label>SELECT STANDARD</label>
                <div class="errormsg pull-right">{{ $errors->first('standard') }}</div>
                <a class="btn btn-select btn-select-light">
                    <input type="hidden" class="btn-select-input" id="standard" name="standard" value="" />
                    <span class="btn-select-value standard-value">SELECT STANDARD</span>
                    <span class="btn-select-arrow glyphicon"><i class="fa fa-chevron-circle-down"></i></span>
                    <ul id="standard-option">
                    </ul>
                </a>
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
        var state = e.target.value;

        $.get('{{ url('en/information') }}/create/ajax-school?state=' + state, function(data) {
            $('#school-option').empty();
            $('.school-value').html('SELECT SCHOOL');
            $.each(data, function(index,subCatObj){
                $('#school-option').append('<li data-id="'+subCatObj.id+'">'+subCatObj.name+'</li>');
            });
        });
    });
    
    $('#school').on('change', function(e){
        var school_id = e.target.value;

        $.get('{{ url('en/information') }}/create/ajax-standard?school_id=' + school_id, function(data) {
            $('#standard-option').empty();
            $('.standard-value').html('SELECT STANDARD');
            $.each(data, function(index,subCatObj){
                $('#standard-option').append('<li data-id="'+subCatObj.id+'">'+subCatObj.name+'</li>');
            });
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