@extends('app')
@section('title','Indianapolis Career In Real Estate - Testimonials')
@section('description','')
@section('footer-scripts')
    <script type="text/javascript">// Masonry Testimonials
        var container = document.querySelector('#container');
        var msnry = new Masonry( container, {
            // options

            itemSelector: '.item'
        });
    </script>
@endsection