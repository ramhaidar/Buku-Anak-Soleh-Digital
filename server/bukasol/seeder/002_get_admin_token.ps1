# API URL
$loginUrl = "http://127.0.0.1:8080/api/v1/users/auth/login"

# Log in as admin to get the token
Write-Host "`nLogging in to get auth token..."

$loginData = @{
    username = "admin1"
    password = "admin123"
} | ConvertTo-Json

try {
    $loginResponse = Invoke-RestMethod -Uri $loginUrl -Method Post -Headers @{
        "Content-Type" = "application/json"
    } -Body $loginData

    # Extract token from response
    $token = $loginResponse.token
    
    # Output token to console
    Write-Host "`nAuth Token:"
    Write-Host $token

    # Save token to file
    $token | Out-File -FilePath "admin_token.txt"
    Write-Host "`nToken has been saved to admin_token.txt"
}
catch {
    Write-Host "Failed to get auth token: $_"
}

pause