<?php
$topdir = "../../..";
$title = "MPI_Improbe(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_IMPROBE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Improbe</b> - Non-blocking matched probe for a message.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Improbe(int source, int tag, MPI_Comm comm,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *flag, MPI_Message *message, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_IMPROBE(SOURCE, TAG, COMM, FLAG, MESSAGE, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SOURCE, TAG, COMM, MESSAGE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>There is no C++ binding for this function.
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>source </dt>
<dd>Source rank or MPI_ANY_SOURCE (integer). </dd>

<dt>tag </dt>
<dd>Tag
value or MPI_ANY_TAG (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>flag
</dt>
<dd>Flag (logical). </dd>

<dt>message </dt>
<dd>Message (handle). </dd>

<dt>status </dt>
<dd>Status object (status). </dd>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
Like <a href="../man3/MPI_Probe.3.php">MPI_Probe</a> and <a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a>,
the <a href="../man3/MPI_Mprobe.3.php">MPI_Mprobe</a> and MPI_Improbe opera- tions allow incoming messages to be
queried without actually receiving them, except that <a href="../man3/MPI_Mprobe.3.php">MPI_Mprobe</a> and MPI_Improbe
provide a mechanism to receive the specific message that was matched regardless
of other intervening probe or receive operations.  This gives the application
an opportunity to decide how to receive the message, based on the information
returned by the probe.  In particular, the application may allocate memory
for the receive buffer according to the length of the probed message. <p>
A
matching probe with MPI_PROC_NULL as <i>source</i> returns <i>flag</i> = true, <i>message</i>
= MPI_MESSAGE_NULL, and the <i>status</i> object returns source = MPI_PROC_NULL,
tag = MPI_ANY_TAG, and count = 0. <p>
<a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a> returns a true value in <i>flag</i>
if a message has been matched and can be received by passing the <i>message</i>
handle to the <a href="../man3/MPI_Mrecv.3.php">MPI_Mrecv</a> or <a href="../man3/MPI_Imrecv.3.php">MPI_Imrecv</a> functions, provided the <i>source</i> was
not MPI_PROC_NULL.
<p>
<h2><a name='sect8' href='#toc8'>Note</a></h2>
This is an MPI-3 function and has no C++ binding.

<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors.  <p>
Before the error value is returned, the current MPI
error handler is called. By default, this error handler aborts the MPI job,
except for I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Mprobe.3.php">MPI_Mprobe</a>
<a href="../man3/MPI_Probe.3.php">MPI_Probe</a>
<a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a>
<a href="../man3/MPI_Mrecv.3.php">MPI_Mrecv</a>
<a href="../man3/MPI_Imrecv.3.php">MPI_Imrecv</a>
<a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
