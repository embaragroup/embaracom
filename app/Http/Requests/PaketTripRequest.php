<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric|min:5',
            'deskripsi' => 'required',
            // 'image_product' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required',
            'end_date' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'kategori_trip_id' => 'required',
            'range_date' => 'required',
            'include_breakfast' => 'required|in:Ya,Tidak',
            'include_flight' => 'required|in:Ya,Tidak',
            'include_transport' => 'required|in:Ya,Tidak',
            'include_parking' => 'required|in:Ya,Tidak',
        ];
    }

    public function messages() 
    {
        return [
            'title.required' => 'Mohon masukan judul paket trip.',
            'price.required' => 'Mohon masukan harga paket trip.',
            'price.numeric' => 'Mohon masukan angka.',
            'deskripsi.required' => 'Mohon masukan info paket trip.',
            'start_date.required' => 'Mohon masukan, tanggal mulai.',
            'end_date.required' => 'Mohon masukan tanggal selesai.',
            // 'image_product.required' => 'Mohon masukan gambar cover paket trip.',
            // 'image_product.image' => 'Mohon masukan gambar ber format : jpeg, png, jpg.',
            'image_product.max' => 'Ukuran gambar maksimal 2 MB.',
            'province_id.required' => 'Mohon pilih provinsi.',
            'city_id.required' => 'Mohon pilih kota.',
            'kategori_trip_id.required' => 'Mohon pilih kategory.',
            'range_date.required' => 'Mohon masukan rentang waktu',
            'include_breakfast.required' => 'Mohon pilih include breakfast, YA atau TIDAK.',
            'include_flight.required' => 'Mohon pilih include tiket pesawat, YA atau TIDAK.',
            'include_transport.required' => 'Mohon pilih include transport, YA atau TIDAK.',
            'include_parking.required' => 'Mohon pilih include parking, YA atau TIDAK.',
        ];
    }
}
