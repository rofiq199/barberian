<?php
include "koneksi.php";
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                    $_SESSION['cukur'][$barang_id] = 1; 
                
            }
        } elseif ($act == "plus") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['items'][$barang_id])) {
                    $_SESSION['cukur'][$barang_id] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['cukur'][$barang_id])) {
                    $_SESSION['cukur'][$barang_id] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['barang_id'])) {
                $barang_id = $_GET['barang_id'];
                if (isset($_SESSION['cukur'][$barang_id])) {
                    unset($_SESSION['cukur'][$barang_id]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['cukur'])) {
                foreach ($_SESSION['cukur'] as $key => $val) {
                    unset($_SESSION['cukur'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }   
     
?>