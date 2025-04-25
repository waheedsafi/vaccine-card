<?php




require __DIR__ . '/api/auth/userAuth.php';
require __DIR__ . '/api/auth/auth.php';
require __DIR__ . '/api/auth/epiAuth.php';
require __DIR__ . '/api/auth/financeAuth.php';
require __DIR__ . '/api/template/job.php';
require __DIR__ . '/api/template/role.php';
require __DIR__ . '/api/template/permission.php';
require __DIR__ . '/api/template/media.php';
require __DIR__ . '/api/template/profile.php';
require __DIR__ . '/api/template/application.php';
require __DIR__ . '/api/template/log.php';
require __DIR__ . '/api/template/destination.php';
require __DIR__ . '/api/template/destinationType.php';
require __DIR__ . '/api/template/audit.php';
require __DIR__ . '/api/template/location.php';
require __DIR__ . '/api/template/pendingTask.php';
require __DIR__ . '/api/app/dashboard/epiAdminDashboard.php';
require __DIR__ . '/api/app/dashboard/financeAdminDashboard.php';
require __DIR__ . '/api/app/dashboard/debuggerAdminDashboard.php';
require __DIR__ . '/api/app/users/epiUser.php';
require __DIR__ . '/api/app/users/financeUser.php';

require __DIR__ . '/api/app/file/file.php';
require __DIR__ . '/api/app/checklist/checklist.php';
require __DIR__ . '/api/app/zone/zone.php';
require __DIR__ . '/api/app/certificate/epiCertificate.php';
require __DIR__ . '/api/app/certificate/financeCertificate.php';
require __DIR__ . '/api/app/logs/loginLogs.php';
require __DIR__ . '/api/app/travel/travel.php';
require __DIR__ . '/api/app/vaccine/vaccine.php';
