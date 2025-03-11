# API URL dan Token
$apiUrl = "http://127.0.0.1:8080/api/v1/users/auth/register-teacher"
# Read token from file
$tokenFilePath = Join-Path -Path $PSScriptRoot -ChildPath "admin_token.txt"
$token = Get-Content -Path $tokenFilePath -Raw

# Loop untuk membuat 30 teacher
for ($i = 1; $i -le 30; $i++) {
    # Data dinamis untuk setiap teacher
    $name = "Guru Bagus $i"
    $username = "guru$i"
    $nip = 1234567800 + $i
    $classNumber = 5 + ($i % 5) # Variasi kelas dari 5 hingga 9
    $className = "$classNumber-Dzaid"
    
    # Payload JSON untuk setiap permintaan
    $jsonData = @{
        name      = $name
        username  = $username
        nip       = $nip.ToString()
        className = $className
    } | ConvertTo-Json

    # Mengirim permintaan POST menggunakan Invoke-RestMethod
    try {
        $response = Invoke-RestMethod -Uri $apiUrl -Method Post -Headers @{
            "Authorization" = "Bearer $token"
            "Content-Type"  = "application/json"
        } -Body $jsonData

        Write-Host "Teacher $i registration successful."
    }
    catch {
        Write-Host "Teacher $i registration failed: $_"
    }
}

pause