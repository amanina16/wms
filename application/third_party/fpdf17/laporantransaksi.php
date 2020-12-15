<?php
    require_once(DOCROOT."/application/third_party/fpdf17/fpdf.php");
     
    class FPDF_AutoWrapTable extends FPDF {
        private $data = array();
        private $options = array(
            'filename' => '',
            'destinationfile' => '',
            'paper_size'=>'F4',
            'orientation'=>'P'
        );
     
        function __construct($data = array(), $options = array()) {
            parent::__construct();
            $this->data = $data;
            $this->options = $options;
        }
     
        public function rptDetailData () {
            //
            $border = 0;
            $this->AddPage();
            $this->SetAutoPageBreak(true,60);
            $this->AliasNbPages();
            $left = 25;
     
            //header
            //Logo
            //lihat fungsi Image() di fpdf
            $this->Image('icon.png',10,10,200);
            //Arial bold 15
            $this->SetFont('Arial','B',15);
            //Move to the right
            //lihat fungsi Cell() di fpdf
            $this->Cell(600); 
            //Title
            $this -> SetY(70);
            $this -> SetX(100); 
            $this->Cell(400,30,'Laporan Transaksi',1,0,'C');
            //Line break
            
            $this->Ln(20);
     
            $h = 15;
            $left = 2000;
            $top = 150;  
            #tableheader
            $this->SetFillColor(200,200,200);   
            $left = $this->GetX();

            $this->SetY(120);
            $this->SetX(200);
            $this->Cell(100, $h, 'ID Pemesanan ', 1, 0, 'C',true);
            $this->SetX($left += 272); $this->Cell(100, $h, 'ID Pengguna', 1, 1, 'C',true);
			
            $this->SetX($left += 272); $this->Cell(100, $h, 'Tanggal Transaksi', 1, 1, 'C',true);
			
            $this->SetX($left += 272); $this->Cell(100, $h, 'Total Pembayaran', 1, 1, 'C',true);
			
            // $this->SetX($left += 100); $this->Cell(90, $h, 'Pengarang', 1, 0, 'C',true);
            // $this->SetX($left += 90); $this->Cell(80, $h, 'Tahun Terbit', 1, 0, 'C',true);
            // $this->SetX($left += 80); $this->Cell(90, $h, 'Id Genre', 1, 0, 'C',true);
            // $this->SetX($left += 90); $this->Cell(100, $h, 'Id Rak', 1, 1, 'C',true);
            //$this->Ln(20);
            
            $this->SetFont('Arial','',13);
            $this->SetWidths(array(100,100));
            $this->SetAligns(array('C','C'));
            //$no = 1; $this->SetFillColor(255);
            $pg_br = 0;
            if($this->data!=null)
            {
                
                foreach ($this->data as $baris) {
                    $this->SetX(200);
                    $this->Cell(100, 15, $baris->id_pemesanan, 1,0,'L');
                    $this->Cell(100, 15, $baris->id_pengguna, 1, 0, 'L');
					
                    $this->Cell(100, 15, $baris->tanggal_transaksi, 1, 0, 'L');
					
                    $this->Cell(100, 15, $baris->totalbayar_pemesanan, 1, 0, 'R');
                    // $this->Row(
                    //     array(
                    //     $baris->month, 
                    //     $baris->income
                        
                    // ));
                    $this->Ln();
                }
            }
                
     
        }
     
        public function printPDF () {
     
            if ($this->options['paper_size'] == "F4") {
                $a = 8.3 * 72; //1 inch = 72 pt
                $b = 13.0 * 72;
                $this->FPDF($this->options['orientation'], "pt", array($a,$b));
            } else {
                $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
            }
     
            $this->SetAutoPageBreak(false);
            $this->AliasNbPages();
            $this->SetFont("helvetica", "B", 10);
            //$this->AddPage();
     
            $this->rptDetailData();
     
            $this->Output($this->options['filename'],$this->options['destinationfile']);
        }
     
        private $widths;
        private $aligns;
     
        function SetWidths($w)
        {
            //Set the array of column widths
            $this->widths=$w;
        }
     
        function SetAligns($a)
        {
            //Set the array of column alignments
            $this->aligns=$a;
        }
     
        function Row($data)
        {
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=30;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++)
            {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,10,$data[$i],0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }
     
        function CheckPageBreak($h)
        {
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }
     
        function NbLines($w,$txt)
        {
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
    } //end of class
?>