<?php

namespace App\Exports;

use App\Models\invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return invoice::all();
    }
    public function headings(): array
    {
        return ["Mã đơn hàng", "Mã tài khoản", "Mã vận chuyển", "Mã thanh toán", "Tổng tiền", "Tình trạng đơn hàng", "Ngày lập đơn"];
    }
}
