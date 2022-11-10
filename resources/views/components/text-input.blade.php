@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-[#EEA766] focus:ring focus:ring-[#EEA766] focus:ring-opacity-50']) !!}>
