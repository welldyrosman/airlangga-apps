<?php

namespace App\Http\Controllers;

//require('../fpdf/fpdf.php');
use Codedge\Fpdf\Fpdf\Fpdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class PDFController extends Controller
{
    public function bookingpdf(Request $request,$id){
        $packages=DB::table('travel_book as b')
        ->join('travel_pack as p','b.pack_id','=','p.id')
        ->join('users as u','u.google_id','=','b.member_id')
        ->select('b.*','p.pack_nm','p.city','u.name','u.email','u.phone_no')
        ->where('b.id',$id)->first();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
         $filepath = public_path() . '\assets\dist\img\travel.png';

        // //$filepath = $path . $company->logo;

        if(file_exists($filepath)) {
            //throw new Exception($filepath);
            $pdf->Image($filepath,10,5,-600);
        }
        $pdf->SetFont('Arial','B',16);
      //  $contents = Storage::get('file.jpg');
       // $pdf->Image(asset('assets/dist/img/travel.png'),10,10,-300);
        $pdf->Cell(0,5,'Airlangga Travel',0,1,'C');
        $path=URL::asset('assets/dist/img/travel.png');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,10,' Perum Puri Anggrek Blok F5 No 4, Serang- Banten','B',1,'C');
        $pdf->ln(5);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(120,6,'To: '.$packages->name,0,0,'L');
        $pdf->Cell(70,6,'Kode Booking #'.$packages->book_no,0,1,'R');
        $pdf->Cell(120,6,'Email: '.$packages->email,0,0,'L');
        $pdf->Cell(70,6,'Status #[Belum Membayar]',0,1,'R');
        $pdf->Cell(120,6,'Phone: '.$packages->phone_no,0,0,'L');
        $pdf->Cell(70,6,'Jatuh Tempo Pembayaran @ '.date('Y-m-d', strtotime('-2 days', strtotime($packages->pack_date))),0,1,'R');
        $pdf->ln(5);
        //header
        $pdf->SetTextColor(255 , 255, 255);
        $pdf->SetFillColor(0 , 149, 230);
        $pdf->SetDrawColor(0 , 149, 230);
        $pdf->Cell(10,10,'No','TB',0,'C',1);
        $pdf->Cell(70,10,'Nama Package','TB',0,'C',1);
        $pdf->Cell(40,10,'Harga','TB',0,'C',1);
        $pdf->Cell(20,10,'Qty','TB',0,'C',1);
        $pdf->Cell(50,10,'Total','TB',1,'C',1);

        //body
        $pdf->SetTextColor(0 , 0, 0);
        $pdf->Cell(10,10,'1','TB',0,'C');
        $pdf->Cell(70,10,'['.$packages->city.']-'.$packages->pack_nm,'TB',0,'C');
        $pdf->Cell(40,10,'IDR '.number_format($packages->price),'TB',0,'C');
        $pdf->Cell(20,10,$packages->pack_qty,'TB',0,'C');
        $total=$packages->price*$packages->pack_qty;
        $pdf->Cell(50,10,'IDR '.number_format($total),'TB',1,'R');

        $pdf->Cell(100,10,'','',0,'C');
        $pdf->Cell(40,10,'Subtotal','B',0,'L');
        $pdf->Cell(50,10,'IDR '.number_format($total),'B',1,'R');

        $pdf->Cell(100,10,'','',0,'C');
        $pdf->Cell(40,10,'Diskon '.$packages->disc.'%','B',0,'L');
        $disc=$total*$packages->disc;
        $pdf->Cell(50,10,'IDR '.number_format($disc),'B',1,'R');

        $pdf->Cell(100,10,'','',0,'C');
        $pdf->Cell(40,10,'Total','B',0,'L');
        $pdf->Cell(50,10,'IDR '.number_format($total-$disc) ,'B',1,'R');

        $pdf->Cell(100,10,'','',0,'C');
        $pdf->Cell(40,10,'DP Min 30%','B',0,'L');
        $pdf->Cell(50,10,'IDR '.number_format(($total-$disc)*0.3),'B',1,'R');

        $pdf->Cell(100,10,'','',0,'C');
        $pdf->Cell(40,10,'Yang Sudah Di Bayarkan','B',0,'L');
        $pdf->Cell(50,10,'IDR '.number_format($packages->dp_pay),'B',1,'R');

        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(0,5,"
Note:\n
1. Segera lakukan pembayaran minimal 30% dari total jumlah biaya perjalanan.(diperbolehkan untuk melakukan fullpayment)
2. pembayaran maksimal 2 hari dari tanggal booking.
3. lakukan konfirmasi setalah melakukan pembayaran.
4. kode booking tidak bisa digunakan jika belum melakukan pembayaran DP Minimum dalam 2 hari.
5. Pelunasan dilakukan pada hari H (bagi yang belum lunas).
6. Pemabayaran Hanya di lakukan ke Nomer Rek Berikut
        No Rekening     : 76786876
        Atas Nama        :ABDUL GHANI
        Bank                 : BCA

Hubungi Kami Jika Informasi belum jelas atau ada pertanyaan lain yang ingin di sampaikan,team kami akang dengan senang hati membantu anda
Phone/WhatsApps/Pesan Singkat : 0811-121-143 / Email : info@airlanggasejahtera.com

",1,'L');


        $pdf->SetTextColor(255 , 255, 255);
        $pdf->Cell(0,10,'Airlangga Sejahter Group','1',1,'C',1);

       // printf($path);
      //  $pdf->Image(URL::asset('public/assets/dist/img/travel.png'),1,1,1);
        $pdf->Output();
        exit;
    }
}
