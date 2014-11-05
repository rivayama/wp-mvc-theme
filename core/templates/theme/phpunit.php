<phpunit
	bootstrap="../../plugins/wp-mvc-theme/core/tests/bootstrap.php"
    backupGlobals="false"
    colors="true"
    convertErrorsToExceptions="true"
    convertNoticesToExceptions="true"
    convertWarningsToExceptions="true"
    >
    <testsuites>
        <testsuite name="all">
            <directory>./tests/</directory>
        </testsuite>
    </testsuites>
</phpunit>
