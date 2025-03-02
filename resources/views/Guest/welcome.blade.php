@extends('Guest.base')

@section('content')



    <main>

        <!--               SECTION DEDIEE A L'ACCUEIL            -->
        <section class="hero d-flex justify-content-center align-items-center" id="section_1">
            @include('Guest.accueil')
        </section>

        <!--               SECTION DEDIEE A L'A PROPOS                    -->

        <section class="about section-padding" id="section_2">
            @include('Guest.about')
        </section>

        <!--            SECTION DEDIE A AUX PROJETS REALISES                                 -->


        <section class="services section-padding" id="section_3">
            @include('Guest.achievment')
        </section>


        <!--                   SECTION    NOUS SOUTENIR                  -->
        <section class="contact section-padding" id="section_4">
            {{--<livewire:make-donnation/>--}}
            @include('Guest.donnation')
        </section>


        <!--                         SECTION    NOUS CONTACTER                     -->


        <section class="contact section-padding" id="section_5">
            <livewire:contact-us/>
        </section>

    </main>



@endsection
