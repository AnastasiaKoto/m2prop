<?php
$secret = 'b5Tg8Jh2Y4vL9';
$github_signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

// Получаем данные от GitHub
$payload = file_get_contents('php://input');
if (!verifyGitHubSignature($payload, $github_signature, $secret)) {
    http_response_code(403);
    exit('Forbidden');
}
$data = json_decode($payload, true);

// Обрабатываем только пуши в master и мердж-реквесты
if ($_SERVER['HTTP_X_GITHUB_EVENT'] === 'pull_request') {
    $action = $data['action'] ?? null;
    $merged = $data['pull_request']['merged'] ?? false;
    $base_branch = $data['pull_request']['base']['ref'];
    
    if ($action === 'closed' && $merged && $base_branch === 'master') {
        shell_exec('/var/www/u3338955/data/opt/scripts/deploy.sh > /dev/null 2>&1 &');
        echo "Deploy started after merge to master";
    }
}

function verifyGitHubSignature($payload, $github_signature, $secret) {
    if (empty($github_signature)) {
        return false;
    }
    $expected_signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);

    return hash_equals($expected_signature, $github_signature);
}
?>