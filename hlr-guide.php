<?php
/**
 * @var db $db
 */

require "settings/init.php";

// 1. Hent JSON-dataen og lav den om til et PHP-array
$jsonData = file_get_contents("data/data_guide.json");
$trinData = json_decode($jsonData, true);

// 2. Find ud af, hvilket trin brugeren er på (standard er trin 0)
$nuvaerendeTrin = isset($_GET['trin']) ? (int)$_GET['trin'] : 0;
$antalTrin = count($trinData);

// Sikkerhed: Sørg for at trinnet ikke er uden for arrayets grænser
if ($nuvaerendeTrin < 0) $nuvaerendeTrin = 0;
$visModal = false;

if ($nuvaerendeTrin >= $antalTrin) {
    $visModal = true; // Trigger Bootstrap modalen hvis guiden er færdig
    $nuvaerendeTrin = $antalTrin - 1; // Hold os på sidste trin i baggrunden
}

// Hent data for det aktuelle trin
$data = $trinData[$nuvaerendeTrin];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>hlr-guide</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheet -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome ikoner -->
    <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>

    <!-- Bootstraps ikoner -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Favicon: https://favicon.io/favicon-converter/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


</head>

<body>

<div class="guide-container">

    <div class="row mb-3 back-arrow-container">
        <div class="col-12">
            <a href="guides.php" class="back-arrow">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
    </div>

    <h2 class="HLR-h2">Hjerte-lunge redning</h2>

    <div class="steps-header">
        <?php
        $badgeNavne = ["Tjek", "Ring", "Tryk", "Fortsæt"];
        foreach ($badgeNavne as $index => $navn):
            // Kun tillad at klikke bagud (ligesom i din JS-kode)
            if ($index <= $nuvaerendeTrin): ?>
                <a href="?trin=<?php echo $index; ?>" class="step-badge <?php echo ($index === $nuvaerendeTrin) ? 'active' : ''; ?>">
                    <?php echo $navn; ?>
                </a>
            <?php else: ?>
                <span class="step-badge"><?php echo $navn; ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="guide-content">
        <div class="image-container">
            <img src="<?php echo $data['billede']; ?>" alt="Guide illustration" style="max-width: 100%; height: auto; display: block; margin: 0 auto 20px ">
        </div>
        <h3 class="fw-bold"><?php echo $data['titel']; ?></h3>
        <p class="fw-bold"><?php echo $data['tekst']; ?></p>

        <div class="husk-box">
            <strong>💡 HUSK:</strong> <span><?php echo $data['husk']; ?></span>
        </div>
    </div>

    <div class="guide-footer">
        <?php if ($nuvaerendeTrin === $antalTrin - 1): ?>
            <a href="?trin=<?php echo $antalTrin; ?>" class="next-button text-center text-decoration-none d-block" style="background-color: #2196F3; line-height: 24px;">AFSLUT GUIDE</a>
        <?php else: ?>
            <a href="?trin=<?php echo $nuvaerendeTrin + 1; ?>" class="next-button text-center text-decoration-none d-block" style="background-color: #5CD685; line-height: 24px;">NÆSTE TRIN</a>
        <?php endif; ?>

        <div class="progress-dots">
            <?php for ($i = 0; $i < $antalTrin; $i++): ?>
                <span class="dot <?php echo ($i === $nuvaerendeTrin) ? 'active' : ''; ?>"></span>
            <?php endfor; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="completionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" style="max-width: 320px; margin: 0 auto;">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.2); background-color: #ffffff;">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <i class="bi bi-check-circle-fill" style="font-size: 2.5rem; color: #5CD685;"></i>
                </div>
                <h4 class="fw-bold mb-2" style="color: #000000; font-size: 20px;">Godt arbejdet!</h4>
                <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.4;">Du har gennemført guiden i Hjerte-lunge redning.</p>
                <a href="hlr-guide.php" class="btn next-button w-100 text-center text-decoration-none" style="background-color: #5CD685; color: white; padding: 12px; border-radius: 12px; font-weight: 700; font-size: 14px; line-height: 20px;">OKAY</a>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php if ($visModal): ?>
<script>
    const myModal = new bootstrap.Modal(document.getElementById('completionModal'));
    myModal.show();
</script>
<?php endif; ?>


</body>
</html>
