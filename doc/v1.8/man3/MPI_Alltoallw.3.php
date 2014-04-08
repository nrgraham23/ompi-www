<?php
$topdir = "../../..";
$title = "MPI_Alltoallw(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_ALLTOALLW(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Alltoallw, <a href="../man3/MPI_Ialltoallw.3.php">MPI_Ialltoallw</a></b> - All processes send data of different
types to, and receive data of different types from, all processes
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Alltoallw(const void *sendbuf, const int sendcounts[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int sdispls[], const MPI_Datatype sendtypes[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *recvbuf, const int recvcounts[], const int rdispls[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI_Datatype recvtypes[], MPI_Comm comm)
int <a href="../man3/MPI_Ialltoallw.3.php">MPI_Ialltoallw</a>(const void *sendbuf, const int sendcounts[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int sdispls[], const MPI_Datatype sendtypes[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *recvbuf, const int recvcounts[], const int rdispls[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI_Datatype recvtypes[], MPI_Comm comm,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ALLTOALLW(SENDBUF, SENDCOUNTS, SDISPLS, SENDTYPES,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVBUF, RECVCOUNTS, RDISPLS, RECVTYPES, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNTS(*), SDISPLS(*), SENDTYPES(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNTS(*), RDISPLS(*), RECVTYPES(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
<a href="../man3/MPI_Ialltoallw.3.php">MPI_IALLTOALLW</a>(SENDBUF, SENDCOUNTS, SDISPLS, SENDTYPES,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVBUF, RECVCOUNTS, RDISPLS, RECVTYPES, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNTS(*), SDISPLS(*), SENDTYPES(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVCOUNTS(*), RDISPLS(*), RECVTYPES(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Alltoallw(const void* sendbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int sendcounts[], const int sdispls[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype sendtypes[], void* recvbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int recvcounts[], const int rdispls[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype recvtypes[])
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>sendbuf </dt>
<dd>Starting address of send buffer. </dd>

<dt>sendcounts </dt>
<dd>Integer
array, where entry i specifies the number of elements to send to rank i.
</dd>

<dt>sdispls </dt>
<dd>Integer array, where entry i specifies the displacement (in bytes,
offset from <i>sendbuf</i>) from which to send data to rank i. </dd>

<dt>sendtypes </dt>
<dd>Datatype
array, where entry i specifies the datatype to use when sending data to
rank i. </dd>

<dt>recvcounts </dt>
<dd>Integer array, where entry j specifies the number of
elements to receive from rank j. </dd>

<dt>rdispls </dt>
<dd>Integer array, where entry j specifies
the displacement (in bytes, offset from <i>recvbuf</i>) to which data from rank
j should be written. </dd>

<dt>recvtypes </dt>
<dd>Datatype array, where entry j specifies the
datatype to use when receiving data from rank j. </dd>

<dt>comm </dt>
<dd>Communicator over
which data is to be exchanged.
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>recvbuf </dt>
<dd>Address of receive
buffer. </dd>

<dt>request </dt>
<dd>Request (handle, non-blocking only). </dd>

<dt>IERROR </dt>
<dd>Fortran only:
Error status.
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Alltoallw is a generalized collective operation
in which all processes send data to and receive data from all other processes.
It adds flexibility to <a href="../man3/MPI_Alltoallv.3.php">MPI_Alltoallv</a> by allowing the user to specify the
datatype of individual data blocks (in addition to displacement and element
count). Its operation can be thought of in the following way, where each
process performs 2n (n being the number of processes in communicator <i>comm</i>)
independent point-to-point communications (including communication with itself).
<p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;n);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;for (i = 0, i &lt; n; i++)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;    <a href="../man3/MPI_Send.3.php">MPI_Send</a>(sendbuf + sdispls[i], sendcounts[i],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;        sendtypes[i], i, ..., comm);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;for (i = 0, i &lt; n; i++)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;    <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>(recvbuf + rdispls[i], recvcounts[i],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;        recvtypes[i], i, ..., comm);
</pre><p>
Process j sends the k-th block of its local <i>sendbuf</i> to process k, which
places the data in the j-th block of its local <i>recvbuf</i>. <p>
When a pair of processes
exchanges data, each may pass different element count and datatype arguments
so long as the sender specifies the same amount of data to send (in bytes)
as the receiver expects to receive. <p>
Note that process i may send a different
amount of data to process j than it receives from process j. Also, a process
may send entirely different amounts and types of data to different processes
in the communicator.
<p> WHEN COMMUNICATOR IS AN INTER-COMMUNICATOR <p>
When the
communicator is an inter-communicator, the gather operation occurs in two
phases.  The data is gathered from all the members of the first group and
received by all the members of the second group.  Then the data is gathered
from all the members of the second group and received by all the members
of the first.  The operation exhibits a symmetric, full-duplex behavior.
 <p>
The first group defines the root process.  The root process uses MPI_ROOT
as the value of <i>root</i>.  All other processes in the first group use MPI_PROC_NULL
as the value of <i>root</i>.  All processes in the second group use the rank of
the root process in the first group as the value of <i>root</i>. <p>
When the communicator
is an intra-communicator, these groups are the same, and the operation occurs
in a single phase. <p>

<p>
<h2><a name='sect8' href='#toc8'>Use of In-place Option</a></h2>
When the communicator is an intracommunicator,
you can perform an all-to-all operation in-place (the output buffer is used
as the input buffer).  Use the variable MPI_IN_PLACE as the value of <i>sendbuf</i>.
 In this case, <i>sendcounts</i>, <i>sdispls</i>, and <i>sendtypes</i> are ignored.  The input
data of each process is assumed to be in the area where that process would
receive its own contribution to the receive buffer.
<p>
<h2><a name='sect9' href='#toc9'>Notes</a></h2>
<p>
The specification
of counts, types, and displacements should not cause any location to be
written more than once. <p>
All arguments on all processes are significant. The
<i>comm</i> argument, in particular, must describe the same communicator on all
processes. <p>
The offsets of <i>sdispls</i> and <i>rdispls</i> are measured in bytes. Compare
this to <a href="../man3/MPI_Alltoallv.3.php">MPI_Alltoallv</a>, where these offsets are measured in units of <i>sendtype</i>
and <i>recvtype</i>, respectively.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error
value; C routines as the value of the function and Fortran routines in
the last argument. C++ functions do not return errors. If the default error
handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Alltoall.3.php">MPI_Alltoall</a>
<a href="../man3/MPI_Alltoallv.3.php">MPI_Alltoallv</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
