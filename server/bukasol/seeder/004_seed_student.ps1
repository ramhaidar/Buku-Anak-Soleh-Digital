# API URLs and Token
$apiUrl = "http://127.0.0.1:8080/api/v1/users/auth/register-student"
$teacherApiUrl = "http://127.0.0.1:8080/api/v1/users/admin/teacher-account"

# Read token from file
$tokenFilePath = Join-Path -Path $PSScriptRoot -ChildPath "admin_token.txt"
$token = Get-Content -Path $tokenFilePath -Raw

# Fetch all teacher accounts in a single call
Write-Host "Fetching teacher accounts..."
try {
    $response = Invoke-RestMethod -Uri $teacherApiUrl -Method Get -Headers @{
        "Authorization" = "Bearer $token"
    }
    
    $teachers = $response.content
    Write-Host "Total teachers fetched: $($teachers.Count)"
}
catch {
    Write-Host "Error fetching teachers: $_"
    pause
    exit
}

# Exit if no teachers found
if ($teachers.Count -eq 0) {
    Write-Host "No teachers found. Exiting."
    pause
    exit
}

# Number of students to create
$totalStudents = 30

# Loop to create students distributed among teachers
for ($i = 1; $i -le $totalStudents; $i++) {
    # Select teacher (round-robin distribution)
    $teacherIndex = ($i - 1) % $teachers.Count
    $teacher = $teachers[$teacherIndex]
    
    # Data for each student, using teacher's class
    $name = "Murid Bagus $i"
    $username = "murid$i"
    $nisn = 9876543200 + $i
    $className = $teacher.className
    $parentName = "Ibu Murid"

    # Payload JSON for each request
    $jsonData = @{
        teacherId  = $teacher.id
        name       = $name
        username   = $username
        nisn       = $nisn.ToString()
        className  = $className
        parentName = $parentName
    } | ConvertTo-Json

    # Send POST request using Invoke-RestMethod
    try {
        $response = Invoke-RestMethod -Uri $apiUrl -Method Post -Headers @{
            "Authorization" = "Bearer $token"
            "Content-Type"  = "application/json"
        } -Body $jsonData

        Write-Host "Student $i registration successful. Assigned to teacher: $($teacher.name), Class: $className"
    }
    catch {
        Write-Host "Student $i registration failed: $_"
    }
}

pause