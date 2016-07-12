<?php
$topdir = "../../..";
$title = "MPI_Testany(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_TESTANY(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
    <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Testany</b> - Tests for completion of any one previously initiated
communication in a list.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Testany(int count, MPI_Request array_of_requests[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *index, int *flag, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TESTANY(COUNT, ARRAY_OF_REQUESTS, INDEX, FLAG, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, ARRAY_OF_REQUESTS(*), INDEX
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static bool Request::Testany(int count, Request array_of_requests[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int&amp; index, Status&amp; status)
static bool Request::Testany(int count, Request array_of_requests[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int&amp; index)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count </dt>
<dd>List length (integer). </dd>

<dt>array_of_requests </dt>
<dd>Array of
requests (array of handles).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>index </dt>
<dd>Index of operation
that completed, or MPI_UNDEFINED if none completed (integer). </dd>

<dt>flag </dt>
<dd>True
if one of the operations is complete (logical). </dd>

<dt>status </dt>
<dd>Status object (status).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Testany tests
for completion of either one or none of the operations associated with
active handles. In the former case, it returns <i>flag</i> = true, returns in <i>index</i>
the index of this request in the array, and returns in <i>status</i> the status
of that operation; if the request was allocated by a nonblocking communication
call then the request is deallocated and the handle is set to MPI_REQUEST_NULL.
(The array is indexed from 0 in C, and from 1 in Fortran.) In the latter
case (no operation completed), it returns <i>flag</i> = false, returns a value
of MPI_UNDEFINED in <i>index</i>, and <i>status</i> is undefined. <p>
The array may contain
null or inactive handles. If the array contains no active handles then the
call returns immediately with <i>flag</i> = true, <i>index</i> = MPI_UNDEFINED, and an
empty <i>status</i>. <p>
If the array of requests contains active handles then the
execution of MPI_Testany(count, array_of_requests, index, status) has the
same effect as the execution of <a href="../man3/MPI_Test.3.php">MPI_Test</a>(&amp;<i>array_of_requests[i</i>], <i>flag</i>, <i>status</i>),
for <i>i</i>=0,1,...,count-1, in some arbitrary order, until one call returns <i>flag</i>
= true, or all fail. In the former case, <i>index</i> is set to the last value
of <i>i</i>, and in the latter case, it is set to MPI_UNDEFINED. MPI_Testany with
an array containing one active entry is equivalent to <a href="../man3/MPI_Test.3.php">MPI_Test</a>. <p>
If your
application does not need to examine the <i>status</i> field, you can save resources
by using the predefined constant MPI_STATUS_IGNORE as a special value for
the <i>status</i> argument.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>, <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>,
or <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> (depending on the type of MPI handle that generated
the request); the predefined error handler MPI_ERRORS_RETURN may be used
to cause error values to be returned. Note that MPI does not guarantee that
an MPI program can continue past an error. <p>
Note that per MPI-1 section 3.2.5,
MPI exceptions on requests passed to MPI_TESTANY do not set the status.MPI_ERROR
field in the returned status.  The error code is passed to the back-end error
handler and may be passed back to the caller through the return value of
MPI_TESTANY if the back-end error handler returns it.  The pre-defined MPI
error handler MPI_ERRORS_RETURN exhibits this behavior, for example.
<p>
<h2><a name='sect9' href='#toc9'>See
Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a> <br>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a> <br>
<a href="../man3/MPI_Test.3.php">MPI_Test</a> <br>
<a href="../man3/MPI_Testall.3.php">MPI_Testall</a> <br>
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
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
