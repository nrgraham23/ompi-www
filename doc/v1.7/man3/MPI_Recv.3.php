<?php
$topdir = "../../..";
$title = "MPI_Recv(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_RECV(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Recv</b> - Performs a standard-mode blocking receive.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Recv(void *buf, int count, MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int source, int tag, MPI_Comm comm, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_RECV(BUF, COUNT, DATATYPE, SOURCE, TAG, COMM, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, SOURCE, TAG, COMM
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Comm::Recv(void* buf, int count, const Datatype&amp; datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int source, int tag, Status&amp; status) const
void Comm::Recv(void* buf, int count, const Datatype&amp; datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int source, int tag) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count </dt>
<dd>Maximum number of elements to receive (integer). </dd>

<dt>datatype
</dt>
<dd>Datatype of each receive buffer entry (handle). </dd>

<dt>source </dt>
<dd>Rank of source (integer).
</dd>

<dt>tag </dt>
<dd>Message tag (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>buf
</dt>
<dd>Initial address of receive buffer (choice). </dd>

<dt>status </dt>
<dd>Status object (status).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This basic receive
operation, MPI_Recv, is blocking: it returns only after the receive buffer
contains the newly received message. A receive can complete before the matching
send has completed (of course, it can complete only after the matching
send has started). <p>
The blocking semantics of this call are described in
Section 3.4 of the MPI-1 Standard, "Communication Modes." <p>
The receive buffer
contains a number (defined by the value of <i>count</i>) of consecutive elements.
The first element in the set of elements is located at <i>address_buf</i>. The
type of each of these elements is specified by <i>datatype</i>.  <p>
The length of
the received message must be less than or equal to the length of the receive
buffer. An  MPI_ERR_TRUNCATE is returned upon the overflow condition. <p>
If
a message that is shorter than the length of the receive buffer arrives,
then only those locations corresponding to the (shorter) received message
are modified.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
The <i>count</i> argument indicates the maximum number of entries
of type <i>datatype</i> that can be received in a message. Once a message is received,
use the <a href="../man3/MPI_Get_count.3.php">MPI_Get_count</a> function to determine the actual number of entries
within that message. <p>
To receive messages of unknown length, use the <a href="../man3/MPI_Probe.3.php">MPI_Probe</a>
function. (For more information about <a href="../man3/MPI_Probe.3.php">MPI_Probe</a> and <a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a>, see their
respective man pages; also, see Section 3.8 of the MPI-1 Standard, "Probe
and Cancel.")  <p>
A message can be received by a receive operation only if
it is addressed to the receiving process, and if its source, tag, and communicator
(comm) values match the source, tag, and comm values specified by the receive
operation. The receive operation may specify a wildcard value for source
and/or tag, indicating that any source and/or tag are acceptable. The wildcard
value for source is source = MPI_ANY_SOURCE. The wildcard value for tag
is tag = MPI_ANY_TAG. There is no wildcard value for comm. The scope of these
wildcards is limited to the proceses in the group of the specified communicator.
 <p>
The message tag is specified by the tag argument of the receive operation.
 <p>
The argument source, if different from MPI_ANY_SOURCE, is specified as
a rank within the process group associated with that same communicator
(remote process group, for intercommunicators). Thus, the range of valid
values for the source argument is {0,...,n-1} {MPI_ANY_SOURCE}, where n is
the number of processes in this group.  <p>
Note the asymmetry between send
and receive operations: A receive operation may accept messages from an
arbitrary sender; on the other hand, a send operation must specify a unique
receiver. This matches a "push" communication mechanism, where data transfer
is effected by the sender (rather than a "pull" mechanism, where data transfer
is effected by the receiver).  <p>
Source = destination is allowed, that is,
a process can send a message to itself. However, it is not recommended for
a process to send messages to itself using the blocking send and receive
operations described above, since this may lead to deadlock. See Section
3.5 of the MPI-1 Standard, "Semantics of Point-to-Point Communication."  <p>
If
your application does not need to examine the <i>status</i> field, you can save
resources by using the predefined constant MPI_STATUS_IGNORE as a special
value for the <i>status</i> argument.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an
error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Irecv.3.php">MPI_Irecv</a>
<a href="../man3/MPI_Probe.3.php">MPI_Probe</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
