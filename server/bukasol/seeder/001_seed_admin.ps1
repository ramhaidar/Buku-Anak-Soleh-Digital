# API URL
$apiUrl = "http://127.0.0.1:8080/api/v1/users/auth/register-admin"

# Define admin users to be created
$admins = @(
    @{
        name     = "admin1"
        username = "admin1"
        password = "admin123"
    },
    @{
        name     = "admin2"
        username = "admin2"
        password = "admin123"
    },
    @{
        name     = "admin3"
        username = "admin3"
        password = "admin123"
    }
)

# Loop through admin list and register each one
foreach ($admin in $admins) {
    # Payload JSON for the request
    $jsonData = $admin | ConvertTo-Json

    # Send POST request using Invoke-RestMethod
    try {
        $response = Invoke-RestMethod -Uri $apiUrl -Method Post -Headers @{
            "Content-Type"  = "application/json"
        } -Body $jsonData

        Write-Host "Admin $($admin.username) registration successful."
    }
    catch {
        Write-Host "Admin $($admin.username) registration failed: $_"
    }
}

pause