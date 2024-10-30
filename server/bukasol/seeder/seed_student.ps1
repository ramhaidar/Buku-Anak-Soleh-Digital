# API URL dan Token
$apiUrl = "http://127.0.0.1:8080/api/v1/users/auth/register-student"
$token = "eyJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJBYmRpbWFzeSIsInN1YiI6IjdmMjdjNGRmLWE0OWItNDZjZS05YTIzLTk4Mzc0MDJhMDY4MiIsImV4cCI6MTczMDUzMTMzMCwiaWF0IjoxNzI5OTI2NTMwLCJyb2xlcyI6WyJTVVBFUkFETUlOIl0sInVzZXJuYW1lIjoiYWRtaW4ifQ.PfkGVIoBBp3vaExDSPNWPRG1dixsXw039rhh9_xtFF9S1GKKknjeYES_tOePsOmbIicIsYL5DXn5VKfasa5Wfzk2HjPX-3L7c0_lPD93ia0PbqTUqcwZkS1RPFSiTHtxhalQkz_SkkzPELJzBcgGGdi2TIX8FYDjIGxUhJZx3xTe44nErfBBMFNRuuctOzeGz1vW2Riuxs5vM4c8VXS378fXRQ4REkjyZNbkF812ExQl3WUsNHzAGs1bqJvfvZ_A131p79DAvFBTmiS_LqX7HFJ4y9Ae-b3u8aF5xGCjEII89NRjXDyVQoSNxoF0Ab_zXkOtvmRpYiJBCyUHAQM61w"

# ID guru yang akan dihubungkan dengan siswa
$teacherId = "34775365-d9f2-46b6-ba21-797969b62822"

# Loop untuk membuat 30 student
for ($i = 1; $i -le 30; $i++) {
    # Data dinamis untuk setiap student
    $name = "Murid Bagus $i"
    $username = "murid$i"
    $nisn = 9876543200 + $i
    $classNumber = 5 + ($i % 5)  # Variasi kelas dari 5 hingga 9
    $className = "$classNumber-Dzaid"
    $parentName = "Ibu Murid"

    # Payload JSON untuk setiap permintaan
    $jsonData = @{
        teacherId = $teacherId
        name = $name
        username = $username
        nisn = $nisn.ToString()
        className = $className
        parentName = $parentName
    } | ConvertTo-Json

    # Mengirim permintaan POST menggunakan Invoke-RestMethod
    try {
        $response = Invoke-RestMethod -Uri $apiUrl -Method Post -Headers @{
            "Authorization" = "Bearer $token"
            "Content-Type" = "application/json"
        } -Body $jsonData

        Write-Host "Student $i registration successful."
    }
    catch {
        Write-Host "Student $i registration failed: $_"
    }
}
