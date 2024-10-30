@extends('layouts.main')



@section('main.content')

    <section id="mentors" class="py-5" dir="rtl">
      <div class="container" style="margin-top: 7rem; margin-bottom: 7rem;">
        <h1 class="text-center tajawal-bold">الأساتذة و الدورات</h1>
        <p class="text-center">استكشف المدربين و الدورات المتاحة لدينا واختر ما ترغب في رؤيته أو الانضمام إليه.</p>
        
        <livewire:public.section.formation-cart-section />

      </div>
    </section>

@endsection
