<?php

//web routes
$collector->get('/', ['app\controllers\PageController','index']);
$collector->get('naslovna', ['app\controllers\PageController','index']);
$collector->get('naslovna/{id}', ['app\controllers\PageController','index']);
$collector->get('aktivnosti/{id}', ['app\controllers\PageController','index']);
$collector->get('vestine/{id}', ['app\controllers\PageController','index']);
$collector->get('kontakt/{id}', ['app\controllers\PageController','index']);
$collector->post('kontakt/{id}', ['app\controllers\ContactController','insert']);

//admin-articles routes
$collector->get('admin-articles-list', ['app\controllers\adminControllers\AdminArticleController','index']);
$collector->get('admin-articles', ['app\controllers\adminControllers\AdminArticleController','insert']);
$collector->post('admin-articles', ['app\controllers\adminControllers\AdminArticleController','store']);
$collector->get('admin-articles/{id}', ['app\controllers\adminControllers\AdminArticleController','show']);
$collector->patch('admin-articles/{id}', ['app\controllers\adminControllers\AdminArticleController','update']);
$collector->delete('admin-articles/{id}', ['app\controllers\adminControllers\AdminArticleController','destroy']);

//admin-certifications routes
$collector->get('admin-certifications-list', ['app\controllers\adminControllers\AdminCertificationController','index']);
$collector->get('admin-certifications', ['app\controllers\adminControllers\AdminCertificationController','insert']);
$collector->post('admin-certifications', ['app\controllers\adminControllers\AdminCertificationController','store']);
$collector->get('admin-certifications/{id}', ['app\controllers\adminControllers\AdminCertificationController','show']);
$collector->patch('admin-certifications/{id}', ['app\controllers\adminControllers\AdminCertificationController','update']);
$collector->delete('admin-certifications/{id}', ['app\controllers\adminControllers\AdminCertificationController','destroy']);

//admin-certifications routes
$collector->get('admin-messages-list', ['app\controllers\adminControllers\AdminContactController','index']);
$collector->get('admin-messages', ['app\controllers\adminControllers\AdminContactController','newMessage']);
$collector->post('admin-messages', ['app\controllers\adminControllers\AdminContactController','sendEmail']);
$collector->get('admin-messages/{id}', ['app\controllers\adminControllers\AdminContactController','show']);
$collector->delete('admin-messages/{id}', ['app\controllers\adminControllers\AdminContactController','destroy']);

//admin-education routes
$collector->get('admin-education-list', ['app\controllers\adminControllers\AdminEducationController','index']);
$collector->get('admin-education', ['app\controllers\adminControllers\AdminEducationController','insert']);
$collector->post('admin-education', ['app\controllers\adminControllers\AdminEducationController','store']);
$collector->get('admin-education/{id}', ['app\controllers\adminControllers\AdminEducationController','show']);
$collector->patch('admin-education/{id}', ['app\controllers\adminControllers\AdminEducationController','update']);
$collector->delete('admin-education/{id}', ['app\controllers\adminControllers\AdminEducationController','destroy']);

//admin-experience routes
$collector->get('admin-experience-list', ['app\controllers\adminControllers\AdminExperienceController','index']);
$collector->get('admin-experience', ['app\controllers\adminControllers\AdminExperienceController','insert']);
$collector->post('admin-experience', ['app\controllers\adminControllers\AdminExperienceController','store']);
$collector->get('admin-experience/{id}', ['app\controllers\adminControllers\AdminExperienceController','show']);
$collector->patch('admin-experience/{id}', ['app\controllers\adminControllers\AdminExperienceController','update']);
$collector->delete('admin-experience/{id}', ['app\controllers\adminControllers\AdminExperienceController','destroy']);

//admin-languages routes
$collector->get('admin-languages-list', ['app\controllers\adminControllers\AdminLanguageController','index']);
$collector->get('admin-languages', ['app\controllers\adminControllers\AdminLanguageController','insert']);
$collector->post('admin-languages', ['app\controllers\adminControllers\AdminLanguageController','store']);
$collector->get('admin-languages/{id}', ['app\controllers\adminControllers\AdminLanguageController','show']);
$collector->patch('admin-languages/{id}', ['app\controllers\adminControllers\AdminLanguageController','update']);
$collector->delete('admin-languages/{id}', ['app\controllers\adminControllers\AdminLanguageController','destroy']);

//admin-modules routes
$collector->get('admin-modules-list', ['app\controllers\adminControllers\AdminModuleController','index']);
$collector->get('admin-modules', ['app\controllers\adminControllers\AdminModuleController','insert']);
$collector->post('admin-modules', ['app\controllers\adminControllers\AdminModuleController','store']);
$collector->get('admin-modules/{id}', ['app\controllers\adminControllers\AdminModuleController','show']);
$collector->patch('admin-modules/{id}', ['app\controllers\adminControllers\AdminModuleController','update']);
$collector->delete('admin-modules/{id}', ['app\controllers\adminControllers\AdminModuleController','destroy']);

//admin-pages routes
$collector->get('admin-pages-list', ['app\controllers\adminControllers\AdminPageController','index']);
$collector->get('admin-pages', ['app\controllers\adminControllers\AdminPageController','insert']);
$collector->post('admin-pages', ['app\controllers\adminControllers\AdminPageController','store']);
$collector->get('admin-pages/{id}', ['app\controllers\adminControllers\AdminPageController','show']);
$collector->patch('admin-pages/{id}', ['app\controllers\adminControllers\AdminPageController','update']);
$collector->delete('admin-pages/{id}', ['app\controllers\adminControllers\AdminPageController','destroy']);

//admin-projects routes
$collector->get('admin-projects-list', ['app\controllers\adminControllers\AdminProjectController','index']);
$collector->get('admin-projects', ['app\controllers\adminControllers\AdminProjectController','insert']);
$collector->post('admin-projects', ['app\controllers\adminControllers\AdminProjectController','store']);
$collector->get('admin-projects/{id}', ['app\controllers\adminControllers\AdminProjectController','show']);
$collector->patch('admin-projects/{id}', ['app\controllers\adminControllers\AdminProjectController','update']);
$collector->delete('admin-projects/{id}', ['app\controllers\adminControllers\AdminProjectController','destroy']);

//admin-project-members routes

//admin-publications routes
$collector->get('admin-publications-list', ['app\controllers\adminControllers\AdminPublicationController','index']);
$collector->get('admin-publications', ['app\controllers\adminControllers\AdminPublicationController','insert']);
$collector->post('admin-publications', ['app\controllers\adminControllers\AdminPublicationController','store']);
$collector->get('admin-publications/{id}', ['app\controllers\adminControllers\AdminPublicationController','show']);
$collector->patch('admin-publications/{id}', ['app\controllers\adminControllers\AdminPublicationController','update']);
$collector->delete('admin-publications/{id}', ['app\controllers\adminControllers\AdminPublicationController','destroy']);

//admin-publication-authors routes

//admin-skills routes
$collector->get('admin-skills-list', ['app\controllers\adminControllers\AdminSkillController','index']);
$collector->get('admin-skills', ['app\controllers\adminControllers\AdminSkillController','insert']);
$collector->post('admin-skills', ['app\controllers\adminControllers\AdminSkillController','store']);
$collector->get('admin-skills/{id}', ['app\controllers\adminControllers\AdminSkillController','show']);
$collector->patch('admin-skills/{id}', ['app\controllers\adminControllers\AdminSkillController','update']);
$collector->delete('admin-skills/{id}', ['app\controllers\adminControllers\AdminSkillController','destroy']);

//admin-profile routes
$collector->get('admin', ['app\controllers\adminControllers\AdminProfileController','index']);
$collector->any('admin-profile/{id}', ['app\controllers\adminControllers\AdminProfileController','update']);

//admin-user routes
$collector->get('admin-user', ['app\controllers\adminControllers\AdminUserController','index']);
$collector->any('admin-user/{id}', ['app\controllers\adminControllers\AdminUserController','update']);

