<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/27
 * Time: 12:22
 */

class GitController extends CController
{
    public function actionPull()
    {
        LogHelper::write('git.log', 'Start Action');

        $accessToken = 'GitlabToken20170725';

        $content = file_get_contents("php://input");

        $header = $_SERVER;
        if (!isset($header['HTTP_X_GITLAB_TOKEN']) OR $header['HTTP_X_GITLAB_TOKEN'] != $accessToken) {
            LogHelper::write('git.log', 'Token is fail!');
            throw new CHttpException(500, 'Token is Fail!');
        }

        $data = CJSON::decode($content);

        if (empty($data) || $data['event_name'] != 'push' || $data['total_commits_count'] == 0) {
            LogHelper::write('git.log', 'Event is fail');
            throw new CHttpException(404, 'Event is fail');
        }

        $ref = $data['ref'];
        if (empty($ref) || $ref != 'refs/heads/Dev') {
            LogHelper::write('git.log', 'Ref is fail');
            throw new CHttpException(404, 'Ref is fail');
        }

        LogHelper::write('git', date('Y-m-d H:i:s'));

        $commits = $data['commits'];
        foreach ($commits as $i => $row) {
            LogHelper::write('git.log', ($i + 1) . "\tMessage:{$row['message']}\tAuthor:{$row['author']['name']}");
            if (!empty($row['added'])) {
                foreach ($row['added'] as $_i => $_file) {
                    LogHelper::write('git.log', 'Added ' . ($_i + 1) . "\r{$_file}");
                }
            }
            if (!empty($row['modified'])) {
                foreach ($row['modified'] as $_i => $_file) {
                    LogHelper::write('git.log', 'Modified ' . ($_i + 1) . "\r{$_file}");
                }
            }
            if (!empty($row['removed'])) {
                foreach ($row['removed'] as $_i => $_file) {
                    LogHelper::write('git.log', 'Removed ' . ($_i + 1) . "\r{$_file}");
                }
            }
        }

        LogHelper::write('git.log', 'End Action');
    }
}