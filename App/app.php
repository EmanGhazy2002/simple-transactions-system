<?php
function getTransactionsfiles(string $dirpath)
{
   $files = [];
   foreach (scandir($dirpath) as $file) {
      if (is_dir($file))
         continue;

      $files[] = $dirpath . $file;
   }
   return $files;
}

function getTransactios(string $filepath)
{
   if (!file_exists($filepath)) {
      echo "file is exist";
   } else 
   {
      $file = fopen($filepath, 'r');

      $transactions = [];

      while (($transaction = fgetcsv($file)) !== false) {
         if ($transaction !== null) {
            $transactions[] = $transaction;
         }
         
      }
      //  echo '<pre>';
      // print_r($transactions);
      // echo '</pre>'; 
       return $transactions;
   }

  
}

function CalculateTotal($transactions)
{

   // income 
   // expense 
   // Net 



   $total = ['Income' => 0, 'Expense' => 0, 'Net' => 0];

   foreach ($transactions as $transaction) {

      $amount = str_replace(['$', ','], '', $transaction[3]);

      if ($amount > 0) {
         $total['Income'] += $amount;
      } else {
         $total['Expense'] += $amount;
      }
      $total['Net'] += $amount;
   }



   return $total;
}



?>
