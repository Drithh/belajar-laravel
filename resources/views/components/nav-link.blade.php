@props(['active'])

@php
$classes = $active ?? false ? 'hover:text-primary hover:border-b-primary border-transparent border-b-[1px] border-dotted h-5 uppercase font-Josefin text-base text-primary tracking-widest' : 'hover:text-primary hover:border-b-primary border-transparent border-b-[1px] border-dotted h-5 uppercase font-Josefin text-base text-secondary tracking-widest';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
