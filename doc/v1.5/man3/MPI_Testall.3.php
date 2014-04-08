<?php
$topdir = "../../..";
$title = "MPI_Testall(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_TESTALL(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Testall</b> - Tests for the completion of all previously initiated
communications in a list.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Testall(int count, MPI_Request *array_of_requests,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *flag, MPI_Status *array_of_statuses)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TESTALL(COUNT, ARRAY_OF_REQUESTS, FLAG, ARRAY_OF_STATUSES,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, ARRAY_OF_REQUESTS(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_STATUSES(MPI_STATUS_SIZE,*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static bool Request::Testall(int count, Request
<tt> </tt>&nbsp;<tt> </tt>&nbsp;array_of_requests[], Status array_of_statuses[])
static bool Request::Testall(int count, Request array_of_requests[])
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count </dt>
<dd>Lists length (integer). </dd>

<dt>array_of_requests </dt>
<dd>Array of
requests (array of handles).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>flag </dt>
<dd>True if previously initiated
communications are complete (logical.) </dd>

<dt>array_of_statuses </dt>
<dd>Array of status
objects (array of status). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
Returns <i>flag</i> = true if all communications associated with active
handles in the array have completed (this includes the case where no handle
in the list is active). In this case, each status entry that corresponds
to an active handle request is set to the status of the corresponding communication;
if the request was allocated by a nonblocking communication call then it
is deallocated, and the handle is set to MPI_REQUEST_NULL. Each status entry
that corresponds to a null or inactive handle is set to empty. <p>
Otherwise,
<i>flag</i> = false is returned, no request is modified and the values of the
status entries are undefined. This is a local operation. <p>
If your application
does not need to examine the <i>array_of_statuses</i> field, you can save resources
by using the predefined constant MPI_STATUSES_IGNORE can be used as a special
value for the <i>array_of_statuses</i> argument.  <p>
Errors that occurred during the
execution of MPI_Testall are handled in the same manner as errors in <a href="../man3/MPI_Waitall.3.php">MPI_Waitall</a>.

<p>
<h2><a name='sect8' href='#toc8'>Note</a></h2>
<i>flag</i> is true only if all requests have completed. Otherwise, <i>flag</i> is
false, and neither <i>array_of_requests</i> nor <i>array_of_statuses</i> is modified.

<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
For each invocation of MPI_Testall, if one or more requests generate
an MPI exception, only the <i>first</i> MPI request that caused an exception will
be passed to its corresponding error handler.  No other error handlers will
be invoked (even if multiple requests generated exceptions).  However, <i>all</i>
requests that generate an exception will have a relevant error code set
in the corresponding status.MPI_ERROR field (unless MPI_STATUSES_IGNORE
was used). <p>
The default error handler aborts the MPI job, except for I/O
function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>,
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>, or <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> (depending on the type
of MPI handle that generated the MPI request); the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.
<p>
If the invoked error handler allows MPI_Testall to return to the caller,
the value MPI_ERR_IN_STATUS will be returned in the C and Fortran bindings.
 In C++, if the predefined error handler MPI::ERRORS_THROW_EXCEPTIONS is
used, the value MPI::ERR_IN_STATUS will be contained in the MPI::Exception
object.  The MPI_ERROR field can then be examined in the array of returned
statuses to determine exactly which request(s) generated an exception.
<p>

<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a> <br>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a> <br>
<a href="../man3/MPI_Test.3.php">MPI_Test</a> <br>
<a href="../man3/MPI_Testany.3.php">MPI_Testany</a> <br>
<a href="../man3/MPI_Testsome.3.php">MPI_Testsome</a> <br>
<a href="../man3/MPI_Wait.3.php">MPI_Wait</a> <br>
<a href="../man3/MPI_Waitall.3.php">MPI_Waitall</a> <br>
<a href="../man3/MPI_Waitany.3.php">MPI_Waitany</a> <br>
<a href="../man3/MPI_Waitsome.3.php">MPI_Waitsome</a> <br>
<a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Note</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
