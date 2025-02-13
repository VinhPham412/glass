@extends ( 'layouts.shop' )

@section ( 'content' )

    @include('component.shop.hero')

    @include('component.shop.brand')

    @include('component.shop.cat')

    @include('component.shop.card_section')

    @include('component.shop.icon_section')

    @include('component.shop.features')

    @include('component.shop.faq')

    @include('component.shop.blog')

    @include('component.shop.testimonials')

    @include('component.shop.stats')

    @include('component.shop.cilent')

    @include('component.shop.galery')

    @include('component.shop.timeline')

    <livewire:contact-store-front />

{{--    @include('component.shop.logo_section')--}}


@endsection