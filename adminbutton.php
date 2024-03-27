<?php
// Link Laman Utama
    if (isset($_POST['homePage'])){
        echo "<script>  
        document.location = 'admin.php'; 
        </script>";
    }

// Link Info
if (isset($_POST['info'])){
    echo "<script>  
    document.location = 'adminInfo.php'; 
    </script>";
}

// Link Senarai Hakim
    elseif (isset($_POST['itemList'])){
        echo "<script>  
        document.location = 'adminItemList.php'; 
        </script>";        
    }
// Link Admin Pemarkahan
    elseif (isset($_POST['inventory'])){
        echo "<script>  
        document.location = 'adminInventory.php'; 
        </script>";        
    }
// Link Admin Transaction
    elseif (isset($_POST['transaction'])){
        echo "<script>  
        document.location = 'adminTransaction.php'; 
        </script>";        
    }
// Link Admin Report
    elseif (isset($_POST['report'])){
        echo "<script>  
        document.location = 'adminSelectReportDay.php'; 
        </script>";        
    }
// Link logKeluar
    elseif (isset($_POST['logout'])){
        session_destroy();
        session_start();
        unset($_SESSION['IDAdmin']);
        echo "<script>  
        alert ('Successfully Logout');
        document.location = 'index.php'; 
        </script>";        
    }
    if (isset($_POST['adminRegisterItem'])){
        echo "<script>  
        document.location = 'adminRegisterItemPage.php'; 
        </script>";
    }

    if (isset($_POST['daftarpeserta'])){
        echo "<script>  
        document.location = 'adminDaftarPeserta.php'; 
        </script>";
    }

    if (isset($_POST['adminBackToSenPeserta'])){
        echo "<script>  
        document.location = 'adminSenPeserta.php'; 
        </script>";
    }
// Link Admin Kemas Kini
    if (isset($_POST['adminUpdate'])){
        echo "<script>  
        document.location = 'adminUpdatePage.php'; 
        </script>";
    }
    if (isset($_POST['adminEditItem'])){
        echo "<script>  
        document.location = 'adminEditItemPage.php'; 
        </script>";
    }

?>
